window.imgFn = function(w,h){
    var publicImg = document.querySelector('.publicImg');
    var imgRemove = function(img){
      // publicImg.classList.remove('active')
      img.remove();
    }
    var preview2 = function(input, imgWidth, imgHight, imgSize) {
        //固定
        var imgSizeNumber = imgSize*1048576 //大小
        var file = input.files[0]; 
        var type = file.type.split('/')[1]; 
        var idName = input.getAttribute('id'); 
        var closeImg = function(obj) {
            // obj.querySelector('.img').remove()
            imgRemove(obj.querySelector('.img'))
        }
        var inImage = function(o) {
            var publicImg = o.obj.closest(".publicImg");
            if(publicImg.querySelector('img')){
                closeImg(publicImg)
                // publicImg.querySelector('img').remove();
            }
            publicImg.classList.add('active');
            publicImg.append(creatHtml({
                'tage': 'div',
                'cl': 'img',
                'addHtml': [
                    creatHtml({
                        'tage': 'div',
                        'cl': 'imgDiv',
                        'addHtml': [
                          creatHtml({
                              'tage': 'img',
                              'attr': { 'src': o.img  },
                          }),
                        ]
                    }),
                    creatHtml({
                        'tage': 'i',
                        'text': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>',
                        'handler': function(){
                          closeImg(publicImg)
                          publicImg.classList.remove('active')
                          // publicImg.querySelector('.img').remove()
                          // o.obj.value='';
                        }
                    }),
                    creatHtml({
                        'tage': 'input',
                        'attr': { 'type': 'hidden','name': idName,'value': o.img  },
                    }),
                ]
            }))
        }
        var file2Image = function(file,callback){
            var image = new Image();
            var url = URL.createObjectURL(file);
            image.onload = function() {
                callback(image);
                URL.revokeObjectURL(url);
            };
            image.src = url;
        }
    
        if (!(type == 'jpeg' || type == 'jpg' || type == 'png')) {
            alert('錯誤 : 圖片類型只能是 jpg , jpeg , png');
            input.value='' ;
            publicImg.classList.remove('active')
            return;
        }
        
        if (imgSizeNumber<=file.size) {
            alert('錯誤 : 圖片大小需小於'+imgSize+'M');
            input.value='' ;
            publicImg.classList.remove('active')
            return;
        }
    
        if(w){
          //依據格式自動切圖
          file2Image(file, function(img) {
              var canvas = document.createElement("canvas");
              var context = canvas.getContext("2d");
              if(imgWidth){
                canvas.width = imgWidth;
                canvas.height = imgHight;
                var imageWidth = img.width;
                var imageHeight = img.height;
                context.clearRect(0, 0, canvas.width, canvas.height);
                //背景白色
                context.fillStyle = "white"; 
                context.fillRect (0, 0, img.width, img.height);
                if ((imageWidth / imgWidth) > (imageHeight / imgHight)) {
                    context.drawImage(img, imgWidth / 2 - (imgHight * imageWidth / imageHeight) / 2, 0, imgHight * imageWidth / imageHeight, imgHight);
                } else {
                    context.drawImage(img, 0, imgHight / 2 - (imgWidth * imageHeight / imageWidth) / 2, imgWidth, imgWidth * imageHeight / imageWidth);
                }
              }else{
                canvas.width = img.width;
                canvas.height = img.height;
                //背景白色
                context.fillStyle = "white"; 
                context.fillRect (0, 0, img.width, img.height);
                //裁切圖片
                context.drawImage(img, 0, 0, img.width, img.height);
              }
              //轉圖片
              inImage({ 'obj': input, 'img': canvas.toDataURL("image/jpeg", 0.9)})
          })
        }else{
          //不切圖
          file2Image(file, function(img) {
            var canvas = document.createElement("canvas");
            var context = canvas.getContext("2d");
            canvas.width = img.width;
            canvas.height = img.height;
            //背景白色
            context.fillStyle = "white"; 
            context.fillRect (0, 0, img.width, img.height);
            //裁切圖片
            context.drawImage(img, 0, 0, img.width, img.height);
            //轉圖片
            inImage({ 'obj': input, 'img': canvas.toDataURL("image/jpeg", 1.0)})
          })
        }
    }
    var cover = document.querySelector('#cover')
    if(cover){
        cover.addEventListener('change',function(){
          // publicImg.classList.add('active')
          preview2(this, w, h, 1);
        })
    }
    var img = publicImg.querySelector('.img');
    if(img){
      var i = publicImg.querySelector('i');
      if(i){
        i.addEventListener('click',function(){
          console.log('i click')
          publicImg.classList.remove('active')
          imgRemove(img)
        })
      }
    }
}
window.pdfFn = function(w,h){
  var publicImg = document.querySelector('.publicPdf');
  var changeFn = function(){
    var input = publicImg.querySelector('[data-target="file"]')
    var file = this.files[0]; 
    var type = file.type.split('/')[1]; 
    if (!(type == 'pdf')) {
      alert('錯誤 : 圖片類型只能是 pdf');
      input.value='' ;
      return;
    }
  }
  var newFn = function(o) {
    publicImg.querySelector('ul').remove();
    publicImg.append(
      creatHtml({
        'tage': 'ul',
        'addHtml': [
          creatHtml({
            'tage': 'li',
            'addHtml': [
              creatHtml({
                'tage': 'div',
                'addHtml': [
                  creatHtml({
                    'tage': 'input',
                    'attr': { 'type': 'file','name': 'pdf','data-target':'file' },
                    'method':'change',
                    'handler':changeFn
                  }),
                ]
              })
            ]
          })
        ]
      })
    )
  }
  var input = publicImg.querySelector('[data-target="file"]')
  if(input){
    input.addEventListener('change',changeFn)
  }
  var close = publicImg.querySelector('[data-target="close"]');
  if(close){
    close.addEventListener('click',newFn)
  }
}
window.creatHtml = function(o) {
    var tage = o.tage || ''
    var text = o.text || ''
    var cl = o.cl || ''
    var attr = o.attr || ''
    var addHtml = o.addHtml || ''
    var method = o.method || 'click'
    var handler = o.handler || ''
    var handler2 = o.handler2 || ''
    var method2 = o.method2 || method
    var html = document.createElement(tage)
    if (text) {
        html.innerHTML = text
    }
    if (cl) {
        html.className = cl
    }
    if (attr) {
        attr = Array.isArray(attr) ? attr : [attr]
        attr.forEach((element) => {
                Object.keys(element).forEach((item, i) => {
                    html.setAttribute(item, element[item])
                })
            })
            // for(var i=0;i<attr.length;i++){
            //     html.setAttribute(attr[i]['n'],attr[i]['v'])
            // }
    }
    if (addHtml) {
        addHtml = Array.isArray(addHtml) ? addHtml : [addHtml]
            // console.log(addHtml)
        addHtml.forEach(element => html.append(element))
    }
    if (handler) {
        html.addEventListener(method, handler.bind(html), false)
    }
    
    if (handler2) {
        window.addEventListener(method2, handler2, false)
    }
    return html;

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
window.showLoad = function(){
    document.querySelector('.publicLoad').classList.add('active')
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