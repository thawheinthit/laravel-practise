<?php
use Illuminate\Filesystem\Filesystem;
class UploadController extends \BaseController {

	private function defaultPath(){
		return public_path()."/dishes/";
	}

	public function postIndex()
	{
		// Get the image input
		$file = Input::file('file');
		
		$used_by = Input::get('used_by');
		
		// Need validation

	    if($file) {
	    	$filename 			= $file->getClientOriginalName();
			$mime_type          = $file->getMimeType(); 
		   	$extension          = $file->getClientOriginalExtension();
		   	$size 				= $file->getSize();

		   	// Check path exists with user
	    	$filesys = new Filesystem;
			if(!$this->defaultPath()){
				File::makeDirectory($this->defaultPath(), $mode = 0777, true, true);
				$upload_success     = $file->move($this->defaultPath(), $filename); 
			}else{
				$upload_success     = $file->move($this->defaultPath(), $filename); 
			}


		   //return $upload_success;
	        if ($upload_success) {
	            $imageData = array(
	            	'used_by' 	=> $used_by,
	            	'filename'  => $filename,
					'filepath' 	=> $this->defaultPath()
				);

	            $image = Image::create($imageData);

	            return Response::json('success', 200);
	        } else {
	            return Response::json('error', 400);
	        }
	    }
		
		
	}

	public function postDelete(){
    	File::delete($this->defaultPath() . Input::get('file'));
     	return Response::json('success', 200);
	}

	

}