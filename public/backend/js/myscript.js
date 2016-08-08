$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    if(tog == 'is_email' && sel == 1){
        $("#email_note").prop('disabled', false);
        $("#pass_email").prop('disabled', false);
    }else if(tog == 'is_email' && sel == 0){
        $("#email_note").prop('disabled', true);
        $("#pass_email").prop('disabled', true);
    }
    $('#'+tog).prop('value', sel);
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
var loadFile = function(event) {
    var output = document.getElementById('priview_share');
    output.src = URL.createObjectURL(event.target.files[0]);
};
$("#content").keyup(function(){
    $(".content_share").text($("#content").val());
});
$("#name").keyup(function(){
    $(".title_share").text($("#name").val());
    $("#title").val($("#name").val());
});
$("#title").keyup(function(){
    $(".title_share").text($("#title").val());
});
if($("#is_email").val() == "1"){
    $("#email_note").prop('disabled', false);
    $("#pass_email").prop('disabled', false);
}
function readURLID() {
    dem = data[Math.floor(Math.random()*data.length)];
    $('.unactive_input').attr('id', 'pfile'+dem);
    $("#insert_img").append('<div class="col-sm-2" id="div_pfile'+dem+'" style="text-align: center; margin-bottom: 10px;"><img class="priview_upload" id="priview_upload'+dem+'" src=""><div class="fileupload fileupload-new" data-provides="fileupload"><span onclick="del_preview('+dem+', null)" class="fileupload-exists btn btn-primary" style="padding: 8px 10px;">Xóa</span></div></div>');
    ainput = $('.unactive_input').attr('id');
    input = document.getElementById(ainput);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#priview_upload'+dem).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    removeA(data, dem);
    $('.unactive_input').removeClass("unactive_input");
    $("#append_input").append('<input type="file" id="" name="pfile[]" onchange="readURLID()" class="fimage unactive_input" style="display: none" />');
}
$("#add_img").click(function(){
    if(data.length == 0){
        alert("Xin lỗi.! Mỗi sản phẩm chỉ được thêm 5 hình");
    }else{
        $(".unactive_input").click();
    }
});

function del_preview(id, idHinh){
    if(idHinh){
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: base_url+'/dashboard/products/delimg',
            type: 'POST',
            cache: false,
            data: {"_token":_token,"idHinh":idHinh}
        });
    }
    $("#priview_upload"+id).val("").clone(true);
    $("#div_pfile"+id).remove();
    $("#pfile"+id).remove();
    data.push(id);
}


var browseFileURL = "";
function openFileDialog(field) {
    var width = $(window).width() - $(window).width() * 0.05;
    var height = $(window).height() - $(window).height() * 0.05;
    $.colorbox({
        iframe: true,
        href: elfinder_url,
        width: width,
        height: height,
        closeButton: false,
        onClosed: function() {
            if(browseFileURL !== ""){
                document.getElementById(field).value = browseFileURL;
            }
        }
    });
}
function elFinderBrowser(field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: elfinder_url, // use an absolute path!
        title: 'Công cụ',
        width: $(window).width(),
        height: $(window).height() - 50,
        resizable: true,
        maximizable: true
    }, {
        setUrl: function(url) {
            win.document.getElementById(field_name).value = url;
        }
    });
    return false;
}
tinymce.init({
    height: 300,
    language : "vi_VN", // change language here
    selector: ".editor",
    file_browser_callback: elFinderBrowser,
    convert_urls: 0,
    remove_script_host: 0,
    setup: function(ed) {
        // Add a custom button
        ed.addButton('browse', {
            title: 'Insert File',
            onclick: function() {
                var width = $(window).width() - $(window).width() * 0.05;
                var height = $(window).height() - $(window).height() * 0.05;
                $.colorbox({
                    iframe: true,
                    href: elfinder_url,
                    width: width,
                    height: height,
                    closeButton: false,
                    onClosed: function() {
                        // Add you own code to execute something on click
                        ed.focus();
                        if (browseFileURL != "") {
                            var img = "";
                            if (typeof browseFileURL === 'string') {
                                img += '<img src="' + browseFileURL + '" /><br />';
                            } else {
                                for (i = 0; i < browseFileURL.length; i++) {
                                    img += '<img src="' + browseFileURL[i] + '" /><br />';
                                }
                            }
                            ed.selection.setContent(img);
                        }
                    }
                });
            }
        });
    },
    style_formats: [
    {
        title: 'Heading 1',
        block: 'h1'
    }, {
        title: 'Heading 2',
        block: 'h2'
    }, {
        title: 'Heading 3',
        block: 'h3'
    }, {
        title: 'Heading 4',
        block: 'h4'
    }, {
        title: 'Bold text',
        inline: 'b'
    }, {
        title: 'Red text',
        inline: 'span',
        styles: {
            color: '#ff0000'
        }
    }, {
        title: 'Title Images',
        inline: 'span',
        classes: 'img-title'
    }, {
        title: 'Table styles'
    }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
    }
    ]
});
///FULL
tinymce.init({
    height: 300,
    language : "vi_VN", // change language here
    selector: ".editor_full",
    file_browser_callback: elFinderBrowser,
    convert_urls: 0,
    remove_script_host: 0,
    plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "browse insertfile undo redo | styleselect fontsizeselect | bold italic underline strikethrough | \
            alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote charmap | \
            link unlink image media | forecolor backcolor emoticons | pagebreak preview fullscreen",
    fontsize_formats: "8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 36px 48px",
    setup: function(ed) {
        // Add a custom button
        ed.addButton('browse', {
            title: 'Insert File',
            onclick: function() {
                var width = $(window).width() - $(window).width() * 0.05;
                var height = $(window).height() - $(window).height() * 0.05;
                $.colorbox({
                    iframe: true,
                    href: elfinder_url,
                    width: width,
                    height: height,
                    closeButton: false,
                    onClosed: function() {
                        // Add you own code to execute something on click
                        ed.focus();
                        if (browseFileURL != "") {
                            var img = "";
                            if (typeof browseFileURL === 'string') {
                                img += '<img src="' + browseFileURL + '" /><br />';
                            } else {
                                for (i = 0; i < browseFileURL.length; i++) {
                                    img += '<img src="' + browseFileURL[i] + '" /><br />';
                                }
                            }
                            ed.selection.setContent(img);
                        }
                    }
                });
            }
        });
    },
    style_formats: [
    {
        title: 'Heading 1',
        block: 'h1'
    }, {
        title: 'Heading 2',
        block: 'h2'
    }, {
        title: 'Heading 3',
        block: 'h3'
    }, {
        title: 'Heading 4',
        block: 'h4'
    }, {
        title: 'Bold text',
        inline: 'b'
    }, {
        title: 'Red text',
        inline: 'span',
        styles: {
            color: '#ff0000'
        }
    }, {
        title: 'Title Images',
        inline: 'span',
        classes: 'img-title'
    }, {
        title: 'Table styles'
    }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
    }
    ]
});
//Preview Image
function readImage(file) {
  
    var reader = new FileReader();
    var image  = new Image();
  
    reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var n = file.name
            $(".image-preview-filename").val(n);
        };    
    };
    
}
$("#upload-submit").change(function (e) {
    if(this.disabled) return alert('Xin lỗi.! Hình ảnh bạn vừa chọn không đúng định dạng');
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );
});

function format(number) {

    var decimalSeparator = ".";
    var thousandSeparator = ".";

    // make sure we have a string
    var result = String(number);

    // split the number in the integer and decimals, if any
    var parts = result.split(decimalSeparator);
  
    // reverse the string (1719 becomes 9171)
    result = parts[0].split("").reverse().join("");

    // add thousand separator each 3 characters, except at the end of the string
    result = result.replace(/(\d{3}(?!$))/g, "$1" + thousandSeparator);

    // reverse back the integer and replace the original integer
    parts[0] = result.split("").reverse().join("");

    // recombine integer with decimals
    return parts.join(decimalSeparator);
}
$("#price").keyup(function(){
    string = $(this).val();
    string = string.replace(/[^a-zA-Z0-9]/g,''); 
    $("#price").val(format(string));
});
$("#sales").keyup(function(){
    string = $(this).val();
    string = string.replace(/[^a-zA-Z0-9]/g,''); 
    $("#sales").val(format(string));
});
function view_contact(id){
    var token = jQuery("input[name='_token']").val();
    jQuery.ajax({
        url: base_url+'/dashboard/contact/view',
        type: 'POST',
        cache: false,
        data: {'_token':token, 'id':id},
        success:function(data){
            $("#fullname").val(data["fullname"]);
            $("#mail").val(data["email"]);
            $("#sodienthoai").val(data["phone"]);
            $("#noidung").val(data["content"]);
        }
    });
    $('#squarespaceModal').modal('toggle'); 
}


function products_validate(){
    get_title = $("#products_div #title").val();
    get_price = $("#products_div #price").val();
    get_cates = $("#products_div #cates_parent option:selected").val();
    if(get_title.trim() == ""){
        alertify.error('Bạn chưa nhập tên sản phẩm');
    }else if(get_price.trim() == ""){
        alertify.error('Bạn chưa nhập giá sản phẩm');
    }else if(get_cates.trim() == ""){
        alertify.error('Bạn chưa chọn danh mục');
    }else{
        $("#form_data_products").submit();
    }
}
function products_validate_user(){
    get_title = $("#form_data_user #title").val();
    get_username = $("#form_data_user #username").val();
    get_email = $("#form_data_user #email").val();
    get_password = $("#form_data_user #password").val();
    get_repassword = $("#form_data_user #repassword").val();
    if(get_title.trim() == ""){
        alertify.error('Bạn chưa nhập họ tên thành viên');
    }else if(get_username.trim() == ""){
        alertify.error('Bạn chưa nhập tên đăng nhập');
    }else if(get_email.trim() == ""){
        alertify.error('Bạn chưa nhập email');
    }else if(get_password.trim() == ""){
        alertify.error('Bạn chưa nhập mật khẩu');
    }else if(get_repassword.trim() != get_password){
        alertify.error('Nhập lại mật khẩu không trùng khớp');
    }else{
        $("#form_data_user").submit();
    }
}