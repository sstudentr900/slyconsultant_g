window.tinymceFn = function (o) {

  var select = o.select;
  tinymce.remove();
  tinymce.init({
    selector: select, // 目標物件
    theme: "modern", // 模板風格
    language: "zh_TW", //語系
    // paste_data_images: true,
    // image_advtab: true,
    menubar: false,
    verify_html: false, //禁清除html
    // inline: true, //內連
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    //引入套件=>
    //advlist進階清單','autolink自動連結,link連結,image上傳圖片,lists清單,charmap特殊字元表,print列印,preview預覽,media影音,
    //forecolor文字顏色,backcolor文字背景,emoticons表情,undo復原,styleselect格式, bold粗體,italic斜體, alignleft置左對齊, aligncenter置中對齊,
    //bullist項目清單,numlist數字清單, outdent減少縮排, indent增加縮排,fontselect字體樣式 ,fontsizeselect字體大小,code程式碼,table表單
    toolbar: "undo redo | fontsizeselect bold italic forecolor alignleft aligncenter bullist outdent indent image table link code", //bar1顯示套件
    /* enable title field in the Image dialog*/
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    // automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function () {
        var file = this.files[0];
        var type = file.type.split('/')[1]; //類型
        var size = file.size;
        var imgSize = 1070000; //單張圖大小
        if (!(type == 'jpeg' || type == 'jpg' || type == 'png')) {
          alert('錯誤 : 圖片類型只能是 jpg , jpeg , png');
        } else if (size > imgSize) {
          alert('錯誤 : 圖片大小需小於1M');
        } else {
          var reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function () {
            var base64 = reader.result.split(',')[1];
            var id = 'blobid' + (new Date()).getTime();
            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
            // console.log(id, file, base64)
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
          };
        }
      };

      input.click();
    },
    setup: function (editor) {
      editor.on('init', function (e) {
        // console.log('init')
        //載入完成移除load
        loadRemove()
      });
    }
  });
}
window.tableDelet = function (url) {
  var html = creatHtml({
    'tage': 'div',
    'cl': 'publicOverlay delet',
    'addHtml': creatHtml({
      'tage': 'div',
      'cl': 'publicform',
      'addHtml': [
        creatHtml({
          'tage': 'div',
          'cl': 'title',
          'addHtml': creatHtml({
            'tage': 'h3',
            'cl': 'title',
            'text': "訊息通知"
          }),
        }),
        creatHtml({
          'tage': 'div',
          'cl': 'content',
          'addHtml': [
            creatHtml({
              'tage': 'p',
              'text': '你確定刪除?'
            }),
            creatHtml({
              'tage': 'div',
              'cl': 'bottom',
              'addHtml': [
                creatHtml({
                  'tage': 'button',
                  'cl': 'publicBtn2',
                  'text': '取消',
                  'handler': function () {
                    document.querySelector('.publicOverlay.delet').remove()
                    // alert('取消',id)
                  }
                }),
                creatHtml({
                  'tage': 'button',
                  'cl': 'publicBtn2',
                  'text': '確認',
                  'handler': function () {
                    // alert('確認',id)
                    location.href = url;
                  }
                }),
              ]
            }),
          ]
        }),
      ]
    }),
  })
  document.querySelector('body').append(html)
}
window.tablePassowd = function (url) {
  var html = creatHtml({
    'tage': 'div',
    'cl': 'publicOverlay password',
    'addHtml': creatHtml({
      'tage': 'div',
      'cl': 'publicform',
      'addHtml': [
        creatHtml({
          'tage': 'div',
          'cl': 'title',
          'addHtml': creatHtml({
            'tage': 'h3',
            'cl': 'title',
            'text': "修改密碼"
          }),
        }),
        creatHtml({
          'tage': 'div',
          'cl': 'content',
          'addHtml': [
            creatHtml({
              'tage': 'ul',
              'addHtml': creatHtml({
                'tage': 'li',
                'addHtml': creatHtml({
                  'tage': 'input',
                  'attr': { 'type': 'password', 'name': 'password', 'placeholder': '請輸入密碼' },
                }),
              }),
            }),
            creatHtml({
              'tage': 'div',
              'cl': 'bottom',
              'addHtml': [
                creatHtml({
                  'tage': 'button',
                  'cl': 'publicBtn2',
                  'text': '取消',
                  'handler': function () {
                    document.querySelector('.publicOverlay.password').remove()
                  }
                }),
                creatHtml({
                  'tage': 'button',
                  'cl': 'publicBtn2',
                  'text': '送出',
                  'handler': function () {
                    var password = document.querySelector('.publicOverlay.password input[type="password"]')
                    var passwordValue = password.value;
                    if (!passwordValue) {
                      var puplicError = password.querySelector('.puplicError')
                      if (puplicError) {
                        puplicError.remove()
                      }
                      password.after(creatHtml({
                        'tage': 'div',
                        'cl': 'puplicError',
                        'text': '密碼不能為空',
                      }))
                    } else {
                      location.href = url + '/' + passwordValue;
                    }
                  }
                }),
              ]
            }),
          ]
        }),
      ]
    }),
  })
  document.querySelector('body').append(html)
}
window.passowdButton = function (obj) {
  var input = obj.nextSibling.nextSibling
  if (obj.classList.contains('active')) {
    obj.classList.remove('active')
    input.setAttribute('type', 'password')
  } else {
    obj.classList.add('active')
    input.setAttribute('type', 'text')
  }
}
window.fileUploader = function(obj){
  //多檔上傳
  let fileDiv = document.querySelector('[data-target="fileDiv"]');
  if(!fileDiv)return;
  let adds = fileDiv.querySelectorAll('[data-target="add"]');
  let minus = fileDiv.querySelectorAll('[data-target="minus"]');
  let inputs = fileDiv.querySelectorAll('[data-target="file"]');
  let ul = fileDiv.querySelector('ul');
  const className = document.querySelector('.ba').classList[1].replace('_update','').replace('_add','');
  function fileFn(e){
    const file = e.target.files[0];
    if (!file) return;

    //驗證
    const validFileTypes = ["jpeg","jpg", "png", "pdf", "doc", "docx","xls","xlsx"];
    const isValidFileType = validFileTypes.includes(file.name.split('.').pop());
    if (!isValidFileType) {
      alert("格式只能是jpg,png,pdf,doc,xls");
      e.target.value = '';
      return ;
    }
    const isValidFileSize = file.size / 1024 / 1024 < 5;
    if (!isValidFileSize) {
      alert("檔案需小於 5MB!");
      e.target.value = '';
      return ;
    }
  }
  function minusFn(){
    let id = this.dataset.id;
    let length = this.closest('ul').querySelectorAll('li').length;
    this.closest('li').remove();

    //判斷修改時才能刪除資料
    if(id){
      fetch(`/${className}_appendix_delet/${id}`,{
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
      })
      .then(function(res) {
        return res.json();
      })
      .then(function(result) {
        console.log(result)
      })
    }
    //刪除到只剩一個就新增
    if(length==1){
      addFn();
    }
  }
  function addFn(){
      let li = document.createElement('li');
      // let add = document.createElement('a');
      let minus = document.createElement('a');
      let input = document.createElement('input');
      let inputDiv = document.createElement('div');
      input.setAttribute('type','file');
      input.setAttribute('data-target','file')
      input.setAttribute('name','file[]');
      // add.setAttribute('data-target','add')
      // add.innerText = '新增'
      minus.setAttribute('data-target','minus')
      minus.innerText = '刪除'
      // add.addEventListener('click',addFn)
      minus.addEventListener('click',minusFn)
      input.addEventListener('change',fileFn)
      inputDiv.append(input)
      // li.append(inputDiv,add,minus)
      li.append(inputDiv,minus)
      ul.append(li)
  }
  adds.forEach(el => el.addEventListener('click',addFn));
  minus.forEach(el => el.addEventListener('click',minusFn))
  inputs.forEach(el => el.addEventListener('change',fileFn))
}
window.fileUploader2 = function(){
  //多圖上傳預覽 jpg pdf
  const fileDiv = document.querySelector('[data-target="fileDiv2"]');
  if(!fileDiv)return;
  const adds = fileDiv.querySelectorAll('[data-target="add"]');
  const minus = fileDiv.querySelectorAll('[data-target="minus"]');
  const inputs = fileDiv.querySelectorAll('[data-target="file"]');
  const inputDiv = fileDiv.querySelector('.input');
  let num = 0;
  const isClass = document.querySelector('.ba')?document.querySelector('.ba'):document.querySelector('.fn')
  const className = isClass.classList[1].replace('_update','').replace('_add','')
  function inImage(o) {
    const reader = new FileReader();
    const obj = o.obj;
    const file = o.file;
    reader.onload = function (e) {
      //塞入圖片
      obj.closest(".publicImg").append(creatHtml({
        'tage': 'div',
        'cl': 'img',
        'addHtml': [
          creatHtml({
            'tage': 'div',
            'cl': 'imgDiv',
            'addHtml': [
              creatHtml({
                'tage': 'img',
                'attr': { 'src': e.target.result  },
              }),
            ]
          }),
        ]
      }))
    }
    reader.readAsDataURL(file);
  }
  function inPdf(o) {
    const obj = o.obj;
    obj.closest(".publicImg").append(creatHtml({
      'tage': 'div',
      'cl': 'img',
      'addHtml': [
        creatHtml({
          'tage': 'div',
          'cl': 'pdf',
          'text': '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 498.436 498.436" style="enable-background:new 0 0 498.436 498.436;" xml:space="preserve"><path d="M389.277,0H74.15v68.25H22.941v181.13h51.187v249.056h401.368V80.653L389.277,0z M293.805,151.125v14.841H257.07v37.49     h-17.731v-87.987h60.355v14.884H257.07v20.773H293.805z M224.261,160.314c0,7.248-0.906,13.482-2.696,18.723     c-2.2,6.385-5.371,11.584-9.405,15.531c-3.128,3.063-7.226,5.371-12.425,7.032c-4.012,1.23-9.232,1.877-15.747,1.877h-33.392     v-88.009h32.399c7.312,0,12.921,0.539,16.76,1.661c5.134,1.553,9.534,4.228,13.201,8.111c3.689,3.883,6.471,8.585,8.434,14.258     C223.312,145.171,224.261,152.052,224.261,160.314z M86.359,170.258v33.241H68.627v-0.022v-88.009h28.452     c10.785,0,17.817,0.453,21.053,1.337c5.004,1.337,9.297,4.185,12.64,8.542c3.451,4.465,5.134,10.181,5.134,17.127     c0,5.436-0.971,9.923-2.934,13.611c-1.941,3.753-4.422,6.601-7.485,8.736c-2.955,2.049-5.997,3.473-9.103,4.12     c-4.293,0.82-10.354,1.316-18.4,1.316H86.359z M446.375,469.186c-25.842,0-317.306,0-343.105,0c0-13.223,0-116.482,0-219.806     h244.613V68.25H103.292c0-20.535,0-34.751,0-39.108c25.756,0,263.983,0,274.531,0c6.989,6.601,60.873,56.968,68.595,64.151     C446.375,105.136,446.375,442.654,446.375,469.186z"/><path d="M199.066,135.357c-2.157-2.071-4.875-3.408-8.175-4.12c-2.545-0.582-7.334-0.863-14.539-0.863h-7.981v58.22h13.201     c4.94,0,8.499-0.259,10.721-0.841c2.912-0.712,5.285-1.985,7.161-3.667c1.941-1.726,3.451-4.53,4.681-8.456     c1.186-3.969,1.812-9.362,1.812-16.135c0-6.73-0.604-12.015-1.812-15.596C202.884,140.232,201.201,137.406,199.066,135.357z"/><path d="M114.724,134.882c-1.855-2.071-4.249-3.343-7.118-3.904c-2.049-0.41-6.363-0.604-12.705-0.604h-8.542v24.957h9.621     c7.01,0,11.648-0.431,13.999-1.381c2.373-0.906,4.228-2.33,5.587-4.293c1.337-1.963,1.963-4.228,1.963-6.86     C117.55,139.628,116.687,136.996,114.724,134.882z"/></svg>',
        }),
      ]
    }))
  }
  function fileFn(e){
    const obj = e.target;
    const file = e.target.files[0];
    if (!file) return;

    //驗證
    const validFileTypes = ["jpeg","jpg", "png", "pdf"];
    const fileType = file.name.split('.').pop()
    const isValidFileType = validFileTypes.includes(fileType);
    if (!isValidFileType) {
      alert("格式只能是jpg,png,pdf");
      e.target.value = '';
      return ;
    }
    const isValidFileSize = file.size / 1024 / 1024 < 5;
    if (!isValidFileSize) {
      alert("檔案需小於 5MB!");
      e.target.value = '';
      return ;
    }

    if(fileType=='pdf'){
      //
      inPdf({ 'obj': obj })
    }else{
      //jpeg,jpg,png 顯示
      inImage({ 'obj': obj, 'file': file })
    }
  }
  function minusFn(){
    // console.log(this)
    const id = this.dataset?this.dataset.id:'';
    const length = this.closest('.input').querySelectorAll('.publicImg').length;
    this.closest('.publicImg').remove();

    //判斷修改時才能刪除資料
    if(id){
      fetch(`/${className}_appendix_delet/${id}`,{
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
      })
      .then(function(res) {
        return res.json();
      })
      .then(function(result) {
        console.log(result)
      })
    }
    //刪除到只剩一個就新增
    if(length==1){
      addFn();
    }
  }
  function addFn(){
    num++;
    let publicImg = document.createElement('div');
    let label = document.createElement('label');
    let span = document.createElement('span');
    let input = document.createElement('input');
    let i = document.createElement('i');
    publicImg.setAttribute('class','publicImg');
    label.setAttribute('for','cover'+num);
    input.setAttribute('id','cover'+num);
    input.setAttribute('type','file');
    input.setAttribute('data-target','file')
    input.setAttribute('name','file[]');
    span.textContent= '請選擇圖片';
    i.setAttribute('data-target','minus');
    i.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>';
    input.addEventListener('change',fileFn)
    i.addEventListener('click',minusFn)
    label.append(span,input)
    publicImg.append(label,i)
    inputDiv.append(publicImg)
  }
  adds.forEach(el => el.addEventListener('click',addFn));
  minus.forEach(el => el.addEventListener('click',minusFn))
  inputs.forEach(el => el.addEventListener('change',fileFn))
}
window.fileUploader3 = function (o) {
  //多圖上傳且放大
  var fileDiv = document.querySelector('[data-target="fileDiv"]');
  if (!fileDiv) return;
  var adds = fileDiv.querySelectorAll('[data-target="add"]');
  var minus = fileDiv.querySelectorAll('[data-target="minus"]');
  var inputs = fileDiv.querySelectorAll('[data-target="file"]');
  var inputDiv = fileDiv.querySelector('.input');
  var num = 0;
  var isClass = document.querySelector('.ba') ? document.querySelector('.ba') : document.querySelector('.fn');
  var className = isClass.classList[1].replace('_update', '').replace('_add', '');

  function imgZoom(o){
    document.querySelector('body').style.overflow='hidden'
    isClass.append(
      creatHtml({
        'tage': 'div',
        'cl': 'publicImgZoom',
        'addHtml':  creatHtml({
          'tage': 'div',
          'cl': 'box',
          'addHtml': [
            creatHtml({
              'tage': 'i',
              'text': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>',
              'handler':function(){
                isClass.querySelector('.publicImgZoom').remove()
                document.querySelector('body').style.removeProperty('overflow')
              }
            }), 
            creatHtml({
              'tage': 'img',
              'attr': {
                'src': o.img
              }
            }) 
          ],
        }) 
      }) 
    )
  }
  function inImage(o) {
    o.obj.closest(".publicImg").append(creatHtml({
      'tage': 'div',
      'cl': 'imgZoom',
      'addHtml': [
        creatHtml({
          'tage': 'img',
          'attr': {
            'src': o.img
          }
        }) 
      ],
      'handler': function(){
        imgZoom(o)
      }
    }));
  };

  function file2Image(file, callback) {
    var image = new Image();
    var url = URL.createObjectURL(file);

    image.onload = function () {
      callback(image);
      URL.revokeObjectURL(url);
    };

    image.src = url;
  };

  function fileFn(e) {
    var file = e.target.files[0];
    if (!file) return; //驗證

    // var validFileTypes = ["jpeg", "jpg", "png", "pdf"];
    var validFileTypes = o?.type??["jpeg", "jpg", "png"];
    var isValidFileType = validFileTypes.includes(file.name.split('.').pop());

    if (!isValidFileType) {
      // alert("格式只能是jpg,png,pdf");
      alert("格式只能是"+validFileTypes.join(','));
      e.target.value = '';
      return;
    }

    const size = o?.size??5;
    var isValidFileSize = file.size / 1024 / 1024 < size;
    if (!isValidFileSize) {
      alert("檔案需小於 "+size+'MB!');
      e.target.value = '';
      return;
    } //不自動切圖

    //
    file2Image(file, function (img) {
      var canvas = document.createElement("canvas");
      var context = canvas.getContext("2d");
      canvas.width = img.width;
      canvas.height = img.height;
      context.drawImage(img, 0, 0, img.width, img.height);
      inImage({
        'obj': e.target,
        'img': canvas.toDataURL("image/jpeg", 0.9)
      });
    }); 
    //不自動切圖
    // file2Image(file, function(img) {
    //   if (img.width!=imgWidth || img.height!=imgHight) {
    //     alert('錯誤 : 圖片尺寸'+imgWidth+'*'+imgHight);
    //     input.value='' ;
    //     return;
    //   }
    //   var canvas = document.createElement("canvas");
    //   var context = canvas.getContext("2d");
    //   canvas.width = img.width;
    //   canvas.height = img.height;
    //   context.drawImage(img, 0, 0, img.width, img.height);
    //   inImage({ 'obj': input, 'img': canvas.toDataURL("image/jpeg", 0.9)})
    // })
    //自動切圖
    // file2Image(file, function(img) {
    //   var canvas = document.createElement("canvas");
    //   var context = canvas.getContext("2d");
    //   if(imgWidth){
    //     canvas.width = imgWidth;
    //     canvas.height = imgHight;
    //     var imageWidth = img.width;
    //     var imageHeight = img.height;
    //     context.clearRect(0, 0, canvas.width, canvas.height);
    //     if ((imageWidth / imgWidth) > (imageHeight / imgHight)) {
    //       context.drawImage(img, imgWidth / 2 - (imgHight * imageWidth / imageHeight) / 2, 0, imgHight * imageWidth / imageHeight, imgHight);
    //     } else {
    //       context.drawImage(img, 0, imgHight / 2 - (imgWidth * imageHeight / imageWidth) / 2, imgWidth, imgWidth * imageHeight / imageWidth);
    //     }
    //   }else{
    //     canvas.width = img.width;
    //     canvas.height = img.height;
    //     context.drawImage(img, 0, 0, img.width, img.height);
    //   }
    //   inImage({ 'obj': input, 'img': canvas.toDataURL("image/jpeg", 0.9)})
    // })
  }

  function minusFn() {
    // console.log(this)
    var id = this.dataset ? this.dataset.id : '';
    var length = this.closest('.input').querySelectorAll('.publicImg').length;
    this.closest('.publicImg').remove(); //判斷修改時才能刪除資料

    if (id) {
      fetch("/".concat(className, "_appendix_delet/").concat(id), {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      }).then(function (res) {
        return res.json();
      }).then(function (result) {
        console.log(result);
      });
    } //刪除到只剩一個就新增


    if (length == 1) {
      addFn();
    }
  }

  function addFn() {
    num++;
    var publicImg = document.createElement('div');
    var label = document.createElement('label');
    var span = document.createElement('span');
    var input = document.createElement('input');
    var i = document.createElement('i');
    publicImg.setAttribute('class', 'publicImg');
    label.setAttribute('for', 'cover' + num);
    input.setAttribute('id', 'cover' + num);
    input.setAttribute('type', 'file');
    input.setAttribute('data-target', 'file');
    input.setAttribute('name', 'file[]');
    span.textContent = '請選擇圖片';
    i.setAttribute('data-target', 'minus');
    i.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>';
    input.addEventListener('change', fileFn);
    i.addEventListener('click', minusFn);
    label.append(span, input);
    publicImg.append(label, i);
    inputDiv.append(publicImg);
  }

  adds.forEach(function (el) {
    return el.addEventListener('click', addFn);
  });
  minus.forEach(function (el) {
    return el.addEventListener('click', minusFn);
  });
  inputs.forEach(function (el) {
    return el.addEventListener('change', fileFn);
  });
};
window.fileUploaderPdf = function(){
  //單圖上傳預覽 jpg pdf
  const fileDiv = document.querySelector('[data-target="fileDiv3"]');
  if(!fileDiv)return;
  // const adds = fileDiv.querySelectorAll('[data-target="add"]');
  const minus = fileDiv.querySelectorAll('[data-target="minus"]');
  const inputs = fileDiv.querySelectorAll('[data-target="file"]');
  const inputDiv = fileDiv.querySelector('.input');
  let num = 0;
  const isClass = document.querySelector('.ba')?document.querySelector('.ba'):document.querySelector('.fn')
  const className = isClass.classList[1].replace('_update','').replace('_add','')
  function inImage(o) {
    const reader = new FileReader();
    const obj = o.obj;
    const file = o.file;
    reader.onload = function (e) {
      //塞入圖片
      obj.closest(".publicImg").append(creatHtml({
        'tage': 'div',
        'cl': 'img',
        'addHtml': [
          creatHtml({
            'tage': 'img',
            'attr': { 'src': e.target.result  },
          }),
        ]
      }))
    }
    reader.readAsDataURL(file);
  }
  function inPdf(o) {
    const obj = o.obj;
    obj.closest(".publicImg").append(creatHtml({
      'tage': 'div',
      'cl': 'img',
      'addHtml': [
        creatHtml({
          'tage': 'div',
          'cl': 'pdf',
          'text': '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 498.436 498.436" style="enable-background:new 0 0 498.436 498.436;" xml:space="preserve"><path d="M389.277,0H74.15v68.25H22.941v181.13h51.187v249.056h401.368V80.653L389.277,0z M293.805,151.125v14.841H257.07v37.49     h-17.731v-87.987h60.355v14.884H257.07v20.773H293.805z M224.261,160.314c0,7.248-0.906,13.482-2.696,18.723     c-2.2,6.385-5.371,11.584-9.405,15.531c-3.128,3.063-7.226,5.371-12.425,7.032c-4.012,1.23-9.232,1.877-15.747,1.877h-33.392     v-88.009h32.399c7.312,0,12.921,0.539,16.76,1.661c5.134,1.553,9.534,4.228,13.201,8.111c3.689,3.883,6.471,8.585,8.434,14.258     C223.312,145.171,224.261,152.052,224.261,160.314z M86.359,170.258v33.241H68.627v-0.022v-88.009h28.452     c10.785,0,17.817,0.453,21.053,1.337c5.004,1.337,9.297,4.185,12.64,8.542c3.451,4.465,5.134,10.181,5.134,17.127     c0,5.436-0.971,9.923-2.934,13.611c-1.941,3.753-4.422,6.601-7.485,8.736c-2.955,2.049-5.997,3.473-9.103,4.12     c-4.293,0.82-10.354,1.316-18.4,1.316H86.359z M446.375,469.186c-25.842,0-317.306,0-343.105,0c0-13.223,0-116.482,0-219.806     h244.613V68.25H103.292c0-20.535,0-34.751,0-39.108c25.756,0,263.983,0,274.531,0c6.989,6.601,60.873,56.968,68.595,64.151     C446.375,105.136,446.375,442.654,446.375,469.186z"/><path d="M199.066,135.357c-2.157-2.071-4.875-3.408-8.175-4.12c-2.545-0.582-7.334-0.863-14.539-0.863h-7.981v58.22h13.201     c4.94,0,8.499-0.259,10.721-0.841c2.912-0.712,5.285-1.985,7.161-3.667c1.941-1.726,3.451-4.53,4.681-8.456     c1.186-3.969,1.812-9.362,1.812-16.135c0-6.73-0.604-12.015-1.812-15.596C202.884,140.232,201.201,137.406,199.066,135.357z"/><path d="M114.724,134.882c-1.855-2.071-4.249-3.343-7.118-3.904c-2.049-0.41-6.363-0.604-12.705-0.604h-8.542v24.957h9.621     c7.01,0,11.648-0.431,13.999-1.381c2.373-0.906,4.228-2.33,5.587-4.293c1.337-1.963,1.963-4.228,1.963-6.86     C117.55,139.628,116.687,136.996,114.724,134.882z"/></svg>',
        }),
      ]
    }))
  }
  function fileFn(e){
    const obj = e.target;
    const file = e.target.files[0];
    if (!file) return;

    //驗證
    // const validFileTypes = ["jpeg","jpg", "png", "pdf"];
    const validFileTypes = ["pdf"];
    const fileType = file.name.split('.').pop()
    const isValidFileType = validFileTypes.includes(fileType);
    if (!isValidFileType) {
      // alert("格式只能是jpg,png,pdf");
      alert("格式只能是pdf");
      e.target.value = '';
      return ;
    }
    const isValidFileSize = file.size / 1024 / 1024 < 5;
    if (!isValidFileSize) {
      alert("檔案需小於 5MB!");
      e.target.value = '';
      return ;
    }

    if(fileType=='pdf'){
      //
      inPdf({ 'obj': obj })
    }else{
      //jpeg,jpg,png 顯示
      inImage({ 'obj': obj, 'file': file })
    }
  }
  function minusFn(){
    // console.log(this)
    this.closest('.publicImg').remove();
    addFn();
  }
  function addFn(){
    num++;
    let publicImg = document.createElement('div');
    let label = document.createElement('label');
    let span = document.createElement('span');
    let input = document.createElement('input');
    let i = document.createElement('i');
    publicImg.setAttribute('class','publicImg');
    label.setAttribute('for','cover'+num);
    input.setAttribute('id','cover'+num);
    input.setAttribute('type','file');
    input.setAttribute('data-target','file')
    input.setAttribute('name','pdf');
    span.textContent= '請選擇檔案';
    i.setAttribute('data-target','minus');
    i.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>';
    input.addEventListener('change',fileFn)
    i.addEventListener('click',minusFn)
    label.append(span,input)
    publicImg.append(label,i)
    inputDiv.append(publicImg)
  }
  // adds.forEach(el => el.addEventListener('click',addFn));
  minus.forEach(el => el.addEventListener('click',minusFn))
  inputs.forEach(el => el.addEventListener('change',fileFn))
}
window.fileSelect = function(){
  //切換連結和上傳檔案
  const fileDiv = document.querySelector('[data-target="fileMethod"]');
  if(!fileDiv)return;
  const select = fileDiv.querySelector('label select');
  const input = fileDiv.querySelector('.input');
  const minus = fileDiv.querySelector('[data-target="minus"]');
  const inputFile = input.querySelector('input');
  const inImage = function(o) {
    const reader = new FileReader();
    const obj = o.obj;
    const file = o.file;
    reader.onload = function (e) {
      //塞入圖片
      obj.closest(".publicImg").append(creatHtml({
        'tage': 'div',
        'cl': 'img',
        'addHtml': [
          creatHtml({
            'tage': 'img',
            'attr': { 'src': e.target.result  },
          }),
        ]
      }))
    }
    reader.readAsDataURL(file);
  }
  const inPdf = function(o) {
    const obj = o.obj;
    obj.closest(".publicImg").append(creatHtml({
      'tage': 'div',
      'cl': 'img',
      'addHtml': [
        creatHtml({
          'tage': 'div',
          'cl': 'other',
          'text': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.744 8s1.522-8-3.335-8h-8.409v24h20v-13c0-3.419-5.247-3.745-8.256-3zm4.256 11h-12v-1h12v1zm0-3h-12v-1h12v1zm0-3h-12v-1h12v1zm-3.432-12.925c2.202 1.174 5.938 4.883 7.432 6.881-1.286-.9-4.044-1.657-6.091-1.179.222-1.468-.185-4.534-1.341-5.702z"/></svg>',
        }),
      ]
    }))
  }
  const fileFn = function(e){
    const obj = e.target;
    const file = e.target.files[0];
    if (!file) return;

    //驗證
    const validFileTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
    const fileType = file.name.split('.').pop()
    const isValidFileType = validFileTypes.includes(fileType);
    if (!isValidFileType) {
      alert("格式只能是jpg,png,pdf,docx");
      e.target.value = '';
      return ;
    }
    const isValidFileSize = file.size / 1024 / 1024 < 5;
    if (!isValidFileSize) {
      alert("檔案需小於 5MB!");
      e.target.value = '';
      return ;
    }

    if(fileType=='pdf'||fileType=='docx'){
      inPdf({ 'obj': obj })
    }else{
      //jpeg,jpg,png 顯示
      inImage({ 'obj': obj, 'file': file })
    }
  }
  const minusFn = function(){
    const publicImg = this.closest('.publicImg')
    publicImg.querySelector('.img').remove();
    publicImg.querySelector('input').value='';
  }
  const url = creatHtml({
    'tage': 'div',
    'cl': 'url',
    'addHtml': [
      creatHtml({
        'tage': 'input',
        'attr': { 'type': 'text','name': 'file_value','placeholder': '請輸入連結' },
      }),
    ]
  })
  const img = creatHtml({
    'tage': 'div',
    'cl': 'publicImg',
    'addHtml': [
      creatHtml({
        'tage': 'label',
        'addHtml': [
          creatHtml({
            'tage': 'span',
            'text': '請選擇檔案',
          }),
          creatHtml({
            'tage': 'input',
            'attr': { 'type': 'file','accept': ".jpg, .jpeg, .png, .pdf, .docx",'name': 'file_value' },
            'method':'change',
            'handler': fileFn
          }),
        ]
      }),
      creatHtml({
        'tage': 'i',
        'text':'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>',
        'handler': minusFn
      }),
    ]
  })
  select.addEventListener('change',function(){
    // console.log(this.selectedIndex==1)
    //移除
    input.innerHTML=''
    //連結
    if(this.selectedIndex==0){
      input.append(url)
    }
    //檔案
    if(this.selectedIndex==1){
      input.append(img)
    }
  })
  if(minus){
    minus.addEventListener('click',function(){
      input.innerHTML=''
      input.append(img)
    })
  }
  if(inputFile){
    inputFile.addEventListener('change',fileFn)
  }
}
window.selectFn = function () {
  let selectDiv = document.querySelector('[data-target="selectDiv"]');
  if (!selectDiv) return;
  let select = selectDiv.querySelector('select');
  let inputDiv = selectDiv.querySelector('.inputDiv');
  let link = selectDiv.querySelector('.button');
  let origin = window.location.origin;
  let pathname = window.location.pathname.split('/')[1];
  let page = window.location.pathname.split('/')[2];
  let selectValue = window.location.pathname.split('/')[3];
  let serchValue = window.location.pathname.split('/')[4];
  let inputDivFn = function (html = '') {
    inputDiv.textContent = '';
    inputDiv.insertAdjacentHTML('beforeend', html);
  }
  let showDiv = function (selectValueNew, serchValue = '') {
    selectValue = selectValueNew;
    if (selectValueNew == 0) {
      inputDivFn();
    }
    if (selectValueNew == 1) {
      inputDivFn('<input type="text" name="serchValue" placeholder="請輸入訂單編號" value="' + serchValue + '">');
    }
    if (selectValueNew == 2) {
      inputDivFn('<input type="text" name="serchValue" placeholder="請輸入綠界編號" value="' + serchValue + '">');
    }
    if (selectValueNew == 3) {
      fetch("/barecord_get_dues", {
        method: 'get',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
      })
        .then(function (res) {
          return res.json();
        })
        .then(function (result) {
          let array = result.data.map((el) => {
            if (serchValue == el.id) {
              return "<option value=" + el.id + " selected>" + el.name + "</option>";
            } else {
              return "<option value=" + el.id + ">" + el.name + "</option>";
            }
          });
          let html = `<select name="serchValue">
                    ${array.join('')}
                </select>`;
          inputDivFn(html);
        })
    }
    if (selectValueNew == 4) {
      inputDivFn('<input type="text" name="serchValue" placeholder="請輸入會員姓名" value="' + serchValue + '">');
    }
  }
  select.addEventListener('change', function () {
    showDiv(this.value);
  })
  link.addEventListener('click', function () {
    serchValue = selectDiv.querySelector('[name="serchValue"]');
    if (serchValue) {
      serchValue = serchValue.value
    } else {
      serchValue = ''
    }
    document.location.href = origin + '/' + pathname + '/' + page + '/' + selectValue + '/' + serchValue;
  })
  console.log(window.location.pathname.split('/'), pathname, page, selectValue)
  showDiv(selectValue, serchValue)
}
window.loadRemove = function(){
  var publicLoad = document.querySelector('.publicLoad');
  publicLoad.classList.remove('active')
  // publicLoad.addEventListener('transitionrun', () => {
  //     //公告
  //     if(bulletinMessage){
  //         alert(bulletinMessage)
  //     }
  // }, false);
}
window.menu = function(){
  var menu = document.querySelectorAll('.menu>ul>li>b')
  if(!menu)return 
  menu.forEach(element=>{
      element.addEventListener('click',function(){
          var li = this.closest('li')
          if(li.classList.contains('active')){
              li.classList.remove('active')
          }else{
              menu.forEach(obj=>{
                  // var li = obj.closest('li')
                  // if(li.classList.contains('active')){
                  //     li.classList.remove('active')
                  // }
                  obj.closest('li').classList.remove('active')
              })
              li.classList.add('active')
          }
      })
  })
}
window.onload = function () {
  menu()
  fileUploader()
  fileUploader2()
  fileUploaderPdf()
  fileSelect() 
  // selectFn()

  //getUrl
  var getUrl = document.querySelector('.bamain').className.split(' ')[1];
  if (~['bamanager_add', 'bamanager_update', 'bamember_add', 'bamember_update'].indexOf(getUrl)) {
    imgFn(300, 300)
  } else if (~['banews_add', 'banews_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bacourse-news_add', 'bacourse-news_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bameeting_add', 'bameeting_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bacourseinfo_add', 'bacourseinfo_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bagroupcourse_add', 'bagroupcourse_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bafamilytalk_add', 'bafamilytalk_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bainformation_add', 'bainformation_update'].indexOf(getUrl)) {
    imgFn(330, 230)
  } else if (~['bacarousel_add', 'bacarousel_update'].indexOf(getUrl)) {
    imgFn(1500, 750)
  } else if (~['baactivityRecord_add', 'baactivityRecord_update'].indexOf(getUrl)) {
    imgFn(0,0)
  } else if (~['bateamprofile_add', 'bateamprofile_update'].indexOf(getUrl)) {
    imgFn(0,0)
  } else if (~['bacooperativeAgency_add', 'bacooperativeAgency_update'].indexOf(getUrl)) {
    imgFn(0,0)
  } else if (~['bahealthEducationResources_add', 'bahealthEducationResources_update'].indexOf(getUrl)) {
    imgFn(0,0)
    // pdfFn()
  }

  //tinymce
  if (document.querySelectorAll('.tinymce').length) {
    document.querySelectorAll('.tinymce').forEach(element=>{
      tinymceFn({ 'select': '#'+element.id })
    })
  }else{
    //loadRemove
    loadRemove()
  }

}