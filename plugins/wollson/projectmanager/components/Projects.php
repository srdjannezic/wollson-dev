<?php namespace Wollson\ProjectManager\Components;

use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Wollson\ProjectManager\Models\Project;

class Projects extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Widgets The widgets model used for display.
     */
    public $comp_projects;

    public $pageNumber;

    public $postsPerPage;

    public function componentDetails()
    {
        return [
            'name'        => 'Projects',
        ];
    }

    public function defineProperties()
    {
        return [
            'FeaturedFilter' => [
                'title'       => 'Is Featured?',
                'type'        => 'string',
                'default'     => ''
            ],
            'pageNumber' => [
                'title'       => 'rainlab.blog::lang.settings.posts_pagination',
                'description' => 'rainlab.blog::lang.settings.posts_pagination_description',
                'type'        => 'string',
                'default'     => '{{ :page }}',
            ],
            'postsPerPage' => [
                'title'             => 'rainlab.blog::lang.settings.posts_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'rainlab.blog::lang.settings.posts_per_page_validation',
                'default'           => '10',
            ],
        ];
    }

    public function onRun()
    {
        $is_featured = $this->property('FeaturedFilter') != NULL ? $this->property('FeaturedFilter') : false;

        $this->setVars();
        $this->page['currentPage'] = 1;

        $projects = $this->getProjects($is_featured);
        $projects = $this->filterProjects($projects);

    	$this->comp_projects = $this->page['projects'] = $projects;

        if ($pageNumberParam =  $this->paramName('pageNumber')) {
            $currentPage =   $this->property('pageNumber');
            
            if ($currentPage > ($lastPage = $this->comp_projects->lastPage()) && $currentPage > 1)
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
        }

    }

    private function setVars(){
        $this->pageNumber = $this->property('pageNumber');
        $this->postsPerPage = $this->property('postsPerPage');
        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');
        $this->page['currentPage'] = $this->property('pageNumber');
    }

    public function onFilterProjects()
    {
        $is_featured = $this->property('FeaturedFilter') != NULL ? $this->property('FeaturedFilter') : false;

        $this->setVars();
        $this->page['currentPage'] = (int)str_replace('?page=','',$_POST['page']);

        

        $projects = $this->getProjects($is_featured,true);
        $projects = $this->filterProjects($projects);

        $this->comp_projects = $this->page['projects'] = $projects;
    }


    protected function getProjects($is_featured,$is_ajax=false){
    	$project = new Project();

        $this->setPageNum();

        if($is_featured){
    	    $projects = $project->where('is_featured',$is_featured);
        }
        else{
            $projects = $project;
        }

        $perPage = $this->property('postsPerPage');
        //var_dump($isPublished);
        $pageNumber = $this->property('pageNumber');
        if(isset($_POST['page'])){
            $pageNumber = (int)str_replace('?page=','',$_POST['page']);
        }

        if($is_ajax){
            $page = $perPage * $pageNumber;
        }else{
            $page = $perPage;
        }

        //var_dump($projects);

        return $projects->paginate($page,1);
    }

    protected function setPageNum(){
        if(isset($_POST['page'])){
            $this->pageNumber = (int)str_replace('?page=','',$_POST['page']);
        }
    }

    public function filterProjects($projects){
        foreach ($projects as $project) {
            if(isset($project->featured_media)){
                $is_video = $this->filterIsVideo($project->featured_media);
                
                if($is_video){
                    $project->is_video = $is_video;
                }
            }
        }

        return $projects;        
    }


    public function filterIsVideo($file){
        $video = false;
        $exploded = explode(".",$file);
        $ext = end($exploded);

        if(strtolower($ext) =="mp4")
        {
            $video = true;
        }
        elseif(strtolower($ext) =="avi"){
            $video = true;
        }  
        elseif(strtolower($ext) =="wmv"){
            $video = true;
        }   
        elseif(strtolower($ext) =="webm"){
            $video = true;
        }       
        elseif(strtolower($ext) =="3gp"){
            $video = true;
        }   
        elseif(strtolower($ext) =="ogg"){
            $video = true;
        }

        return $video;         
    }
}