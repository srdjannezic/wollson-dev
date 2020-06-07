<?php namespace Wollson\ProjectManager\Components;

use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Wollson\ProjectManager\Models\Project;
use Wollson\ProjectManager\Models\Scope;

class ProjectComponent extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Widgets The widgets model used for display.
     */
    public $comp_project;

    public function componentDetails()
    {
        return [
            'name'        => 'Project',
        ];
    }


    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'Slug',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        ];
    }

    public function onRun()
    {
    	$this->comp_project = $this->page['project'] = $this->getProject();
    	
    }


    protected function getProject(){
        $slug = $this->property('slug');

        $project = new Project();
       
        $project = $project->where('slug',$slug)->first();

        if(isset($project->featured_media)){
            $is_video = $this->filterIsVideo($project->featured_media);
            
            if($is_video){
                $project->is_video = $is_video;
            }
        }

        $gallery = $project->gallery;
        $gallery_items = array();
        //filter fallery and set video state
        foreach ($gallery as $item) {
        	$is_video = $this->filterIsVideo($item['media']);
			$item['is_video'] = $is_video;

			$gallery_items[] = $item;
        }
        $this->page['gallery'] = $gallery_items;
        $this->page['scopes'] = $this->getScopes($project->id);
        $this->page['prevProject'] = $this->prevRecord($project->id);
        $this->page['nextProject'] = $this->nextRecord($project->id);
        
        return $project;
    }

    public function prevRecord($currentId) {
        $prevRecord = Project::where('id', '<>', $currentId)->where('id','<', $currentId)->orderBy('id', 'ASC')->first();
        return $prevRecord;
    }

    public function nextRecord($currentId) {
        $nextRecord = Project::where('id', '<>', $currentId)->where('id','>', $currentId)->orderBy('id', 'ASC')->first();
        return $nextRecord;
    }

    protected function getScopes($id){
        
    	$projectScopes = Project::find(1);
        $scopes = $projectScopes->scopes;
    	return $scopes;
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