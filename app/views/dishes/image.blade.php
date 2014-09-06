<div class="row">
	<div class="col-md-12">
		<h3>Upload more images for {{$dish->name}}</h3>
	</div>
</div>

<div class="row">
<div class="col-md-12">

    {{ HTML::script('assets/js/dropzone/dropzone.min.js') }}
    {{ HTML::style('assets/css/dropzone/dropzone.css') }}

    <!-- Start File Upload -->
    <div class="wrapper">
    <div id="dropzone">
        {{ Form::open(array('url' => 'upload', 'class'=>'dropzone', 'id'=>'my-dropzone')) }}
        <!-- Single file upload 
        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
        -->
        <!-- Multiple file upload-->
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        <input name="used_by" type="hidden" value="{{$dish->id}}"/>
        {{ Form::close() }}
    </div>
</div>
<script language="javascript">


// myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.myDropzone = {
    init: function() {
      this.on("addedfile", function(file) {

        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
        var _this = this;

        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();

           var fileInfo = new Array();
           fileInfo['name']=file.name;

            $.ajax({
                type: "POST",
                url: "{{ url('/upload/delete') }}",
                data: {file: file.name},
                beforeSend: function () {
                    // before send
                },
                success: function (response) {
               
                    if (response == 'success')
                       alert('deleted');
                },
                error: function () {
                    alert("error");
                }
            });


          _this.removeFile(file);

          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });


        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
  };

</script>
    <!-- End File Upload -->

</div>

</div>

