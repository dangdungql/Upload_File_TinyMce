
<?php 
use app\modules\contrib\filerepo\FilerepoUploadTinyMceAsset;
use yii\web\View;
use yii\helpers\Url;

$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$asset = FilerepoUploadTinyMceAsset::register($this); 

?>        
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model,'path')->hiddenInput(['id' => 'path']); ?>
        <div id='path-group'></div>
        <a href="#" id="select-img" title="Chon hinh anh" class="btn btn-info btn-sm">Chon anh</a>
        <a href="#" id="remove-img" title="Xoa hinh anh" class="btn btn-danger btn-sm">Xoa anh</a>
    </div>
    <div class="col-md-9">

    </div>
</div>

<script>
	
$('a#select-img').click(function(event) {
    event.preventDefault();
    $('#modal-media-imge').modal('show');       
    $('#modal-media-imge').on('hide.bs.modal', function(e) {
        var imgurlsString = $('input#path').val();
        if(imgurlsString.includes('","'))
        {
            var imgurlsArray = JSON.parse(imgurlsString);
            var divPathGroup = $('#path-group');
            var inputTemplate = '<input class="form-control" value="{inputVal}" readonly="readonly"/>';
            var buttonTemplate = '<input type="button" class="button-click" value="Xem" id="{index}" />';
            divPathGroup.empty();            
            var arr={};
            imgurlsArray.forEach(function(imgurl,index) {
                var newHTML = inputTemplate.replace('{inputVal}', imgurl) + buttonTemplate.replace('{index}', index)
                divPathGroup.append(newHTML);
                arr[index]=imgurl;

            });

            divPathGroup.find('.button-click').click(function(event){
                var div_preview = $('#pre_view');
                div_preview.empty();

                var ID = $(event.currentTarget).attr('id');
                filedoc = arr[ID].includes(".doc");
                filedocx = arr[ID].includes(".docx");
                filepdf = arr[ID].includes(".pdf");

                var link_img=arr[ID].toLowerCase();
                filepng = link_img.includes(".png");
                filejpg = link_img.includes(".jpg");
                filegif = link_img.includes(".gif");

                if(filedoc==true||filedocx==true||filepdf==true)
                {
                    var src = "https://docs.google.com/viewer?url=" + arr[ID] + "&embedded=true";
                    div_preview.append('<iframe style="width: 100%; height: 500px;" src="' + src + '"></iframe>');
                    $('#view-imge').modal('show');

                }
                else if(filepng==true||filejpg==true||filegif==true)
                {
                    var res = arr[ID].indexOf("/uploads/");
                    var linkfile = arr[ID].substr(res);
                    var link = ".." + linkfile;
                    div_preview.append('<image src="' + link + '" style="height: 100%;">');
                    $('#view-imge').modal('show');
                }
                else
                {
                    var res = arr[ID].indexOf("/uploads/");
                    var linkfile = arr[ID].substr(res);
                    var link = ".." + linkfile;
                    div_preview.append('<iframe style="width: 100%; height: 500px;" src="' + link + '"></iframe>');
                    $('#view-imge').modal('show');

                }
            });
        }
        else
        {

            var divPathGroup = $('#path-group');
            var inputTemplate = '<input class="form-control" value="{inputVal}" readonly="readonly"/>';
            var buttonTemplate = '<input type="button" class="button-click" value="Xem"/>';

            divPathGroup.empty();
            divPathGroup.append((inputTemplate.replace('{inputVal}', imgurlsString))+ buttonTemplate)
            
            divPathGroup.find('.button-click').click(function(event){
                var link_file = imgurlsString;
                
                var div_preview = $('#pre_view');
                div_preview.empty();

                filedoc = link_file.includes(".doc");
                filedocx = link_file.includes(".docx");
                filepdf = link_file.includes(".pdf");

                var link_img=link_file.toLowerCase();
                filepng = link_file.includes(".png");
                filejpg = link_file.includes(".jpg");
                filegif = link_file.includes(".gif");

                if(filedoc==true||filedocx==true||filepdf==true)
                {
                    var src = "https://docs.google.com/viewer?url=" + link_file + "&embedded=true";
                    div_preview.append('<iframe style="width: 100%; height: 500px;" src="' + src + '"></iframe>');
                    $('#view-imge').modal('show');

                }
                else if(filepng==true||filejpg==true||filegif==true)
                {
                    var res = link_file.indexOf("/uploads/");
                    var linkfile = link_file.substr(res);
                    var link = ".." + linkfile;
                    div_preview.append('<image src="' + link + '" style="height: 100%;">');
                    $('#view-imge').modal('show');
                }
                else
                {
                    var res = link_file.indexOf("/uploads/");
                    var linkfile = link_file.substr(res);
                    var link = ".." + linkfile;
                    div_preview.append('<iframe style="width: 100%; height: 500px;" src="' + link + '"></iframe>');
                    $('#view-imge').modal('show');

                }
            });
        }
    });
});

$('a#remove-img').click(function(event){
	event.preventDefault();
    $('input#path').val('');
    var divPathGroup = $('#path-group');
    var inputTemplate = '<input class="form-control" value="{inputVal}" readonly="readonly"/>';
    divPathGroup.empty();
});
</script>

<div class="modal fade" id="modal-media-imge">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thu Vien</h4>
            <div class="modal-body">
                <iframe id="iView" src="tinymce/dialog.php?field_id=path" style="border: none;width: 100%; height: 500px;"></iframe>

            </div>
            <div class="model-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button id="select_m" type="button" class="btn btn-default" style="float: right;">Chọn</button>
            </div>
            </div>
        </div>
        <script>

            $(function(){
                let select_m = $('#select_m');
                select_m.on('click', function() {
                    let btnIframe = $('#select_multi', $('#iView').contents());
                    btnIframe.click();
                })
            });

        </script>
        
    </div>
    
</div>
<div class="modal fade" id="view-imge">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <div class="modal-body">
                <div style='height: 500px; width: 100%; display:flex; justify-content: center;   align-items:center;' id='pre_view'></div>

            </div>
            </div>
        </div>
    </div>
    
</div>