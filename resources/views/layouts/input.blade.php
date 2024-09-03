@once
@push('customStyle')
<style>
  /*puplicError 錯誤訊息*/
  .puplicError {
    font-size: 12px;
    font-family: 'Noto Sans TC', sans-serif;
    font-weight: 100;
    padding: 2px 6px;
    border-radius: 3px;
    background: red;
    color: #fff;
    position: absolute;
    left: 4px;
    bottom: -16px;
    font-weight: 400;
  }

  /*puplicRequired 必填*/
  .puplicRequired {
    color: red;
  }
</style>
@endpush
@endonce
@if ($type=='sort')
<label for="{{ $id }}">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <input
    type="number"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="請輸入{{ isset($place)?$place:$label }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas)?$datas->$id:($sortValue?$sortValue:'')) }}"
    pattern="^[0-9\s]*"
    required="{{isset($require)?'required':''}}">
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='datetime-local' || $type=='date')
<label for="{{ $id }}">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <input
    type="{{ $type }}"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="請輸入{{ isset($place)?$place:$label }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas)?$datas->$id:'') }}">
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='tinymce')
<label for="{{ $id }}">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <textarea
    rows="5"
    class="tinymce"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    required="{{isset($require)?'required':''}}"
    placeholder="請輸入{{ isset($place)?$place:$label }}">{{ old($id)?old($id):(!$errors->any() && isset($datas)?$datas->$id:'') }}</textarea>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='fileXX')
<!-- 單圖上傳預覽 -->
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <div class="publicImg {{ isset($datas)&&!empty($datas->$id)&&!count($errors->get($id))||old($id)?'active':'' }}">
    <label for="{{$id}}">
      <span>請選擇檔案</span>
      <input class="cover" id="{{$id}}" type="file" accept=".jpg, .jpeg, .png, .pdf">
    </label>
    <!-- 全部表單沒有值錯誤(!$errors->any()),該值沒有錯誤(count($errors->get($id))),他有沒有值(!empty($datas->$id)),上次有該值(old($id)), -->
    @if(isset($datas)&&!empty($datas->$id)&&!count($errors->get($id))||old($id))
    @php
    $imgSaveSrc = isset($imgSaveSrc)&&$imgSaveSrc?$imgSaveSrc:'images';
    $imgSrc = URL::asset($imgSaveSrc).'/'.$datas->$id.'?'.rand();
    $inputValue = $datas->$id;
    if(old($id)){
    if(strpos(old($id),'data') !== false){
    $imgSrc = old($id);
    }
    $inputValue = old($id);
    }
    @endphp
    <div class="img">
      <div class="imgDiv">
        <img src="{{ $imgSrc }}" alt="">
      </div>
      <i>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
      <input type="hidden" name="{{ isset($name)?$name:$id }}" value="{{ $inputValue }}">
    </div>
    @endif
  </div>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='file')
{{-- html 單圖上傳預覽 --}}
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <div class="publicImg">
    <label for="{{$id}}">
      <span>請選擇檔案</span>
      <input class="cover" id="{{$id}}" type="file" accept=".jpg, .jpeg, .png, .pdf">
    </label>
    <!-- 全部表單沒有值錯誤(!$errors->any()),該值沒有錯誤(count($errors->get($id))),他有沒有值(!empty($datas->$id)),上次有該值(old($id)), -->
    @if(old($id))
    @php
    $imgSaveSrc = isset($imgSaveSrc)&&$imgSaveSrc?$imgSaveSrc:'images';
    $imgSrc = URL::asset($imgSaveSrc).'/'.old($id).'?'.rand();
    if(strpos(old($id),'data') !== false){
    $imgSrc = old($id);
    }
    @endphp
    <div class="img">
      <div class="imgDiv">
        <img src="{{ $imgSrc }}" alt="">
      </div>
      <i>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
      <input type="hidden" name="{{ isset($name)?$name:$id }}" value="{{ old($id) }}">
    </div>
    @elseif(isset($datas)&&!empty($datas->$id)&&!count($errors->get($id)))
    @php
    $imgSaveSrc = isset($imgSaveSrc)&&$imgSaveSrc?$imgSaveSrc:'images';
    $imgSrc = URL::asset($imgSaveSrc).'/'.$datas->$id.'?'.rand();
    @endphp
    <div class="img">
      <div class="imgDiv">
        <img src="{{ $imgSrc }}" alt="">
      </div>
      <i>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
      <input type="hidden" name="{{ isset($name)?$name:$id }}" value="{{ $datas->$id }}">
    </div>
    @endif
  </div>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
{{-- css --}}
@once
@push('customStyle')
<style>
  /*publicImg 封面圖片*/
  .publicImg {
    width: 120px;
    height: 120px;
    border: 1px solid #ced4da;
    position: relative;
    display: inline-block;
    flex: 0 0 120px;
  }

  .publicImg label {
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  .publicImg label span {
    font-size: 12px;
    letter-spacing: 1px;
  }

  .publicImg input {
    display: none;
  }

  .publicImg .img {
    width: 100%;
    padding: 5px;
    position: absolute;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 118px;
  }

  .publicImg .img img {
    width: 100%;
    height: auto;
    max-width: 110px;
    max-height: 110px;
    object-fit: contain;
  }

  .publicImg i {
    position: absolute;
    top: -6px;
    right: -10px;
    background: #fff;
    border-radius: 50%;
    border: 1px solid #ced4da;
    cursor: pointer;
    width: 25px;
    height: 25px;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
  }

  .publicImg i svg {
    fill: #777;
  }
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
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
  window.imgFn = function(w, h) {
    var publicImg = document.querySelector('.publicImg');
    var imgRemove = function(img) {
      // publicImg.classList.remove('active')
      img.remove();
    }
    var preview2 = function(input, imgWidth, imgHight, imgSize) {
      //固定
      var imgSizeNumber = imgSize * 1048576 //大小
      var file = input.files[0];
      var type = file.type.split('/')[1];
      var idName = input.getAttribute('id');
      var closeImg = function(obj) {
        // obj.querySelector('.img').remove()
        imgRemove(obj.querySelector('.img'))
      }
      var inImage = function(o) {
        var publicImg = o.obj.closest(".publicImg");
        if (publicImg.querySelector('img')) {
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
                  'attr': {
                    'src': o.img
                  },
                }),
              ]
            }),
            creatHtml({
              'tage': 'i',
              'text': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg>',
              'handler': function() {
                closeImg(publicImg)
                publicImg.classList.remove('active')
                // publicImg.querySelector('.img').remove()
                // o.obj.value='';
              }
            }),
            creatHtml({
              'tage': 'input',
              'attr': {
                'type': 'hidden',
                'name': idName,
                'value': o.img
              },
            }),
          ]
        }))
      }
      var file2Image = function(file, callback) {
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
        input.value = '';
        publicImg.classList.remove('active')
        return;
      }

      if (imgSizeNumber <= file.size) {
        alert('錯誤 : 圖片大小需小於' + imgSize + 'M');
        input.value = '';
        publicImg.classList.remove('active')
        return;
      }

      if (w) {
        //依據格式自動切圖
        file2Image(file, function(img) {
          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");
          if (imgWidth) {
            canvas.width = imgWidth;
            canvas.height = imgHight;
            var imageWidth = img.width;
            var imageHeight = img.height;
            context.clearRect(0, 0, canvas.width, canvas.height);
            //背景白色
            context.fillStyle = "white";
            context.fillRect(0, 0, img.width, img.height);
            if ((imageWidth / imgWidth) > (imageHeight / imgHight)) {
              context.drawImage(img, imgWidth / 2 - (imgHight * imageWidth / imageHeight) / 2, 0, imgHight * imageWidth / imageHeight, imgHight);
            } else {
              context.drawImage(img, 0, imgHight / 2 - (imgWidth * imageHeight / imageWidth) / 2, imgWidth, imgWidth * imageHeight / imageWidth);
            }
          } else {
            canvas.width = img.width;
            canvas.height = img.height;
            //背景白色
            context.fillStyle = "white";
            context.fillRect(0, 0, img.width, img.height);
            //裁切圖片
            context.drawImage(img, 0, 0, img.width, img.height);
          }
          //轉圖片
          inImage({
            'obj': input,
            'img': canvas.toDataURL("image/jpeg", 0.9)
          })
        })
      } else {
        //不切圖
        file2Image(file, function(img) {
          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");
          canvas.width = img.width;
          canvas.height = img.height;
          //背景白色
          context.fillStyle = "white";
          context.fillRect(0, 0, img.width, img.height);
          //裁切圖片
          context.drawImage(img, 0, 0, img.width, img.height);
          //轉圖片
          inImage({
            'obj': input,
            'img': canvas.toDataURL("image/jpeg", 1.0)
          })
        })
      }
    }
    var cover = document.querySelector('#cover')
    if (cover) {
      cover.addEventListener('change', function() {
        console.log('change')
        // publicImg.classList.add('active')
        preview2(this, w, h, 1);
      })
    }
    var img = publicImg.querySelector('.img');
    if (img) {
      var i = publicImg.querySelector('i');
      if (i) {
        i.addEventListener('click', function() {
          console.log('i click')
          publicImg.classList.remove('active')
          imgRemove(img)
        })
      }
    }
  }
</script>
@endpush
@endonce
@elseif ($type=='pdf')
<!-- 單圖上傳 -->
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <div class="publicPdf {{(isset($datas)&&!empty($datas))||old($id)?'active':''}}">
    <ul>
      <li>
        @if(isset($datas)&&!empty($datas))
        <div>{{$datas->pdf}}</div>
        <a data-target='close' data-id='{{ $datas->id }}'>刪除</a>
        <input type="hidden" name="{{ isset($name)?$name:$id }}">
        @else
        <div><input type="file" name="{{ isset($name)?$name:$id }}" data-target='file'></div>
        @endif
      </li>
    </ul>
  </div>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>

@elseif ($type=='file2')
<!-- 多圖上傳預覽 jpg pdf -->
<div class="publicAppendix" data-target="fileDiv2">
  <label data-target='add'>
    {{ $label }}
    @if(isset($require))<span class="puplicRequired">*</span>@endif
    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="537.947px" height="537.947px" viewBox="0 0 537.947 537.947"><path d="M268.974,0C120.411,0,0,120.411,0,268.974c0,148.563,120.411,268.973,268.974,268.973s268.973-120.334,268.973-268.973
      C537.947,120.334,417.537,0,268.974,0z M394.51,286.033c0,11.857-9.715,21.496-21.496,21.496h-64.566v64.566
      c0,11.857-9.715,21.496-21.496,21.496h-35.878c-11.857,0-21.497-9.715-21.497-21.496v-64.566h-64.566
      c-11.857,0-21.497-9.715-21.497-21.496v-35.878c0-11.857,9.715-21.497,21.497-21.497h64.566v-64.566
      c0-11.857,9.715-21.496,21.497-21.496h35.878c11.857,0,21.496,9.715,21.496,21.496v64.566h64.566
      c11.857,0,21.496,9.716,21.496,21.497V286.033z"/></svg> -->
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 309.059 309.059">
      <path style="fill:currentColor;" d="M280.71,126.181h-97.822V28.338C182.889,12.711,170.172,0,154.529,0S126.17,12.711,126.17,28.338    v97.843H28.359C12.722,126.181,0,138.903,0,154.529c0,15.621,12.717,28.338,28.359,28.338h97.811v97.843    c0,15.632,12.711,28.348,28.359,28.348c15.643,0,28.359-12.717,28.359-28.348v-97.843h97.822    c15.632,0,28.348-12.717,28.348-28.338C309.059,138.903,296.342,126.181,280.71,126.181z" />
    </svg>
  </label>
  <div class="input">
    @if(isset($appendixs))
    @foreach ($appendixs as $appendix)
    <div class="publicImg">
      <div class="img">
        @if(strpos($appendix->src,'.pdf')==false)
        <!-- jpg -->
        <div class='imgDiv'>
          <img src="{{ Storage::url(str_replace('public/','',$appendix->src)).'?'.rand() }}">
        </div>
        @else
        <!-- pdf -->
        <div class="pdf"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 498.436 498.436" style="enable-background:new 0 0 498.436 498.436;" xml:space="preserve">
            <path d="M389.277,0H74.15v68.25H22.941v181.13h51.187v249.056h401.368V80.653L389.277,0z M293.805,151.125v14.841H257.07v37.49     h-17.731v-87.987h60.355v14.884H257.07v20.773H293.805z M224.261,160.314c0,7.248-0.906,13.482-2.696,18.723     c-2.2,6.385-5.371,11.584-9.405,15.531c-3.128,3.063-7.226,5.371-12.425,7.032c-4.012,1.23-9.232,1.877-15.747,1.877h-33.392     v-88.009h32.399c7.312,0,12.921,0.539,16.76,1.661c5.134,1.553,9.534,4.228,13.201,8.111c3.689,3.883,6.471,8.585,8.434,14.258     C223.312,145.171,224.261,152.052,224.261,160.314z M86.359,170.258v33.241H68.627v-0.022v-88.009h28.452     c10.785,0,17.817,0.453,21.053,1.337c5.004,1.337,9.297,4.185,12.64,8.542c3.451,4.465,5.134,10.181,5.134,17.127     c0,5.436-0.971,9.923-2.934,13.611c-1.941,3.753-4.422,6.601-7.485,8.736c-2.955,2.049-5.997,3.473-9.103,4.12     c-4.293,0.82-10.354,1.316-18.4,1.316H86.359z M446.375,469.186c-25.842,0-317.306,0-343.105,0c0-13.223,0-116.482,0-219.806     h244.613V68.25H103.292c0-20.535,0-34.751,0-39.108c25.756,0,263.983,0,274.531,0c6.989,6.601,60.873,56.968,68.595,64.151     C446.375,105.136,446.375,442.654,446.375,469.186z"></path>
            <path d="M199.066,135.357c-2.157-2.071-4.875-3.408-8.175-4.12c-2.545-0.582-7.334-0.863-14.539-0.863h-7.981v58.22h13.201     c4.94,0,8.499-0.259,10.721-0.841c2.912-0.712,5.285-1.985,7.161-3.667c1.941-1.726,3.451-4.53,4.681-8.456     c1.186-3.969,1.812-9.362,1.812-16.135c0-6.73-0.604-12.015-1.812-15.596C202.884,140.232,201.201,137.406,199.066,135.357z"></path>
            <path d="M114.724,134.882c-1.855-2.071-4.249-3.343-7.118-3.904c-2.049-0.41-6.363-0.604-12.705-0.604h-8.542v24.957h9.621     c7.01,0,11.648-0.431,13.999-1.381c2.373-0.906,4.228-2.33,5.587-4.293c1.337-1.963,1.963-4.228,1.963-6.86     C117.55,139.628,116.687,136.996,114.724,134.882z"></path>
          </svg></div>
        @endif
      </div>
      <i data-target='minus' data-id='{{$appendix->id}}'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endforeach
    @else
    <div class="publicImg">
      <label for="cover0">
        <span>請選擇檔案</span>
        <input class="cover" id="cover0" type="file" accept=".jpg, .jpeg, .png, .pdf" name="file[]" data-target="file">
      </label>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endif
  </div>
</div>
@elseif ($type=='file3')
<!-- 單pdf上傳預覽  -->
<div class="publicAppendix" data-target="fileDiv3">
  <label data-target='add'>
    {{ $label }}
    @if(isset($require))<span class="puplicRequired">*</span>@endif
  </label>
  <div class="input">
    @if(isset($datas)&&!empty($datas->$id)&&!count($errors->get($id))||old($id))
    <div class="publicImg">
      <div class="img">
        <div class="pdf"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 498.436 498.436" style="enable-background:new 0 0 498.436 498.436;" xml:space="preserve">
            <path d="M389.277,0H74.15v68.25H22.941v181.13h51.187v249.056h401.368V80.653L389.277,0z M293.805,151.125v14.841H257.07v37.49     h-17.731v-87.987h60.355v14.884H257.07v20.773H293.805z M224.261,160.314c0,7.248-0.906,13.482-2.696,18.723     c-2.2,6.385-5.371,11.584-9.405,15.531c-3.128,3.063-7.226,5.371-12.425,7.032c-4.012,1.23-9.232,1.877-15.747,1.877h-33.392     v-88.009h32.399c7.312,0,12.921,0.539,16.76,1.661c5.134,1.553,9.534,4.228,13.201,8.111c3.689,3.883,6.471,8.585,8.434,14.258     C223.312,145.171,224.261,152.052,224.261,160.314z M86.359,170.258v33.241H68.627v-0.022v-88.009h28.452     c10.785,0,17.817,0.453,21.053,1.337c5.004,1.337,9.297,4.185,12.64,8.542c3.451,4.465,5.134,10.181,5.134,17.127     c0,5.436-0.971,9.923-2.934,13.611c-1.941,3.753-4.422,6.601-7.485,8.736c-2.955,2.049-5.997,3.473-9.103,4.12     c-4.293,0.82-10.354,1.316-18.4,1.316H86.359z M446.375,469.186c-25.842,0-317.306,0-343.105,0c0-13.223,0-116.482,0-219.806     h244.613V68.25H103.292c0-20.535,0-34.751,0-39.108c25.756,0,263.983,0,274.531,0c6.989,6.601,60.873,56.968,68.595,64.151     C446.375,105.136,446.375,442.654,446.375,469.186z"></path>
            <path d="M199.066,135.357c-2.157-2.071-4.875-3.408-8.175-4.12c-2.545-0.582-7.334-0.863-14.539-0.863h-7.981v58.22h13.201     c4.94,0,8.499-0.259,10.721-0.841c2.912-0.712,5.285-1.985,7.161-3.667c1.941-1.726,3.451-4.53,4.681-8.456     c1.186-3.969,1.812-9.362,1.812-16.135c0-6.73-0.604-12.015-1.812-15.596C202.884,140.232,201.201,137.406,199.066,135.357z"></path>
            <path d="M114.724,134.882c-1.855-2.071-4.249-3.343-7.118-3.904c-2.049-0.41-6.363-0.604-12.705-0.604h-8.542v24.957h9.621     c7.01,0,11.648-0.431,13.999-1.381c2.373-0.906,4.228-2.33,5.587-4.293c1.337-1.963,1.963-4.228,1.963-6.86     C117.55,139.628,116.687,136.996,114.724,134.882z"></path>
          </svg></div>
      </div>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
      <input type="hidden" name="{{ isset($name)?$name:$id }}" value="{{ old($id)?old($id):$datas->$id }}">
    </div>
    @else
    <div class="publicImg">
      <label for="cover0">
        <span>請選擇檔案</span>
        <!-- <input class="cover" id="cover0" type="file" accept=".jpg, .jpeg, .png, .pdf"  name="{{ isset($name)?$name:$id }}" data-target="file"> -->
        <input class="cover" id="cover0" type="file" accept=".pdf" name="{{ isset($name)?$name:$id }}" data-target="file">
      </label>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endif
    @error($id)
    <div class="puplicError">{!! $message !!}</div>
    @enderror
  </div>
</div>
@elseif ($type=='file4')
<!-- 單檔上傳(word,pdf,jpg)和連結 -->
<div class="publicFileMore fileMethod" data-target="fileMethod">
  <label>
    <select name="file_select">
      <option value="0" @php if(isset($datas)&&$datas->file_select=='0' || !isset($datas)){ echo ' selected'; }@endphp>連結</option>
      <option value="1" @php if(isset($datas)&&$datas->file_select=='1' ){ echo ' selected'; }@endphp>檔案</option>
    </select>
    @if(isset($require))<span class="puplicRequired">*</span>@endif
  </label>
  <div class="input">
    <!-- 
        連結 (當datas沒有值進入連結 || datas有值&&file_select為0&&沒有錯誤 || datas有值&&file_select為0&&有錯誤);
        value (old有上一次紀錄 || datas有值&&沒有錯誤 || 空)
      -->
    @if(
    !isset($datas) ||
    isset($datas) && $datas->file_select=='0' && !count($errors->get('file_value')) ||
    isset($datas) && $datas->file_select=='0' && count($errors->get('file_value'))
    )
    <div class="url">
      <input
        type="text"
        name="file_value"
        placeholder="請輸入連結"
        value="{{ old('file_value')?old('file_value'):(isset($datas)&&!count($errors->get('file_value'))?$datas->file_value:'') }}">
    </div>
    @else
    <!-- 需解決有值但其他覽位錯誤該如何帶值 -->
    @if(
    !empty('file_value') && !count($errors->get('file_value'))
    )
    <div class="publicImg">
      <div class="img">
        <div class="other">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M13.744 8s1.522-8-3.335-8h-8.409v24h20v-13c0-3.419-5.247-3.745-8.256-3zm4.256 11h-12v-1h12v1zm0-3h-12v-1h12v1zm0-3h-12v-1h12v1zm-3.432-12.925c2.202 1.174 5.938 4.883 7.432 6.881-1.286-.9-4.044-1.657-6.091-1.179.222-1.468-.185-4.534-1.341-5.702z" />
          </svg>
        </div>
      </div>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
      <input type="hidden" name="file_value" value="{{ old('file_value')?old('file_value'):(isset($datas)&&!count($errors->get('file_value'))?$datas->file_value:'') }}">
    </div>
    @else
    <div class="publicImg">
      <label for="cover0">
        <span>請選擇檔案</span>
        <input class="cover" id="cover0" type="file" accept=".jpg, .jpeg, .png, .pdf, .docx" name="file_value" data-target="file">
      </label>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endif
    @endif

    @error('file_value')
    <div class="puplicError">{!! $message !!}</div>
    @enderror
  </div>
</div>
@elseif ($type=='file5')
<style>
  /*publicImgZoom*/
  .publicImg .imgZoom {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
  }

  .publicImg .imgZoom img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .publicImgZoom {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9;
    background: rgba(0, 0, 0, .8);
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .publicImgZoom .box {
    width: 100%;
    height: 100%;
    max-width: 80%;
    max-height: 80%;
    padding: 30px 40px;
    position: relative;
  }

  .publicImgZoom i {
    fill: #fff;
    cursor: pointer;
    position: absolute;
    right: 0;
    top: 0;
  }

  .publicImgZoom img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
</style>
<div class="publicAppendix" data-target="fileDiv">
  <label data-target='add'>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif<svg xmlns="http://www.w3.org/2000/svg" width="537.947px" height="537.947px" viewBox="0 0 537.947 537.947">
      <path d="M268.974,0C120.411,0,0,120.411,0,268.974c0,148.563,120.411,268.973,268.974,268.973s268.973-120.334,268.973-268.973
		C537.947,120.334,417.537,0,268.974,0z M394.51,286.033c0,11.857-9.715,21.496-21.496,21.496h-64.566v64.566
		c0,11.857-9.715,21.496-21.496,21.496h-35.878c-11.857,0-21.497-9.715-21.497-21.496v-64.566h-64.566
		c-11.857,0-21.497-9.715-21.497-21.496v-35.878c0-11.857,9.715-21.497,21.497-21.497h64.566v-64.566
		c0-11.857,9.715-21.496,21.497-21.496h35.878c11.857,0,21.496,9.715,21.496,21.496v64.566h64.566
		c11.857,0,21.496,9.716,21.496,21.497V286.033z" />
    </svg></label>
  <div class="input">
    @if(isset($appendixs))
    @foreach ($appendixs as $appendix)
    <div class="publicImg">
      <div class="img">
        <img src="@php
              echo Storage::url(str_replace('public/','',$appendix->src)).'?'.rand();
            @endphp">
      </div>
      <i data-target='minus' data-id='{{$appendix->id}}'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endforeach
    @else
    <div class="publicImg">
      <label for="cover0">
        <span>請選擇圖片</span>
        <input class="cover" id="cover0" type="file" accept=".jpg, .jpeg, .png, .pdf" name="file[]" data-target="file">
      </label>
      <i data-target='minus'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </i>
    </div>
    @endif
  </div>
</div>
@elseif ($type=='appendix')
<!-- 多檔上傳下載 -->
<div class="appendix" data-target="fileDiv">
  <label data-target='add'>
    {{ $label }}
    @if(isset($require))<span class="puplicRequired">*</span>@endif
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 309.059 309.059">
      <path style="fill:currentColor;" d="M280.71,126.181h-97.822V28.338C182.889,12.711,170.172,0,154.529,0S126.17,12.711,126.17,28.338    v97.843H28.359C12.722,126.181,0,138.903,0,154.529c0,15.621,12.717,28.338,28.359,28.338h97.811v97.843    c0,15.632,12.711,28.348,28.359,28.348c15.643,0,28.359-12.717,28.359-28.348v-97.843h97.822    c15.632,0,28.348-12.717,28.348-28.338C309.059,138.903,296.342,126.181,280.71,126.181z" />
    </svg>
  </label>
  <div class="input">
    <ul>
      @if(isset($appendixs))
      @foreach ($appendixs as $appendix)
      <li>
        <div>{{$appendix->name}}</div>
        <!-- <a data-target='add'>新增</a> -->
        <a data-target='minus' data-id='{{$appendix->id}}'>刪除</a>
      </li>
      @endforeach
      @else
      <li>
        <div><input type="file" name="file[]" data-target='file'></div>
        <!-- <a data-target='add'>新增</a> -->
        <a data-target='minus'>刪除</a>
      </li>
      @endif
    </ul>
  </div>
</div>
@elseif ($type=='fn_appendix')
<!-- 前端顯示多檔上傳下載 -->
<div class="appendix">
  <p>附件下載</p>
  <ul>
    @foreach ($appendixs as $appendix)
    <li>
      <a href="{{ Storage::url(str_replace('public/','',$appendix->src)) }}" download="{{$appendix->name}}">{{$appendix->name}}</a>
    </li>
    @endforeach
  </ul>
</div>
@elseif ($type=='release')
{{-- html --}}
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <div class="publicRadio">
    <div class="radio">
      <!-- datas來源資料 release 預設 -->
      <input type="radio" id="y" name="{{ isset($name)?$name:$id }}" value="y"
        @if( old('release')=='y' || isset($datas) && !empty($datas) && $datas->release == 'y' || $release && $release== 'y')
      checked
      @endif
      >
      <label for="y">使用</label>
    </div>
    <div class="radio">
      <input type="radio" id="n" name="{{ isset($name)?$name:$id }}" value="n"
        @if( old('release')=='n' || isset($datas) && !empty($datas) && $datas->release == 'n')
      checked
      @endif
      >
      <label for="n">停用</label>
    </div>
  </div>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
{{-- css --}}
@once
@push('customStyle')
<style>
  .publicRadio {
    display: flex;
  }

  .publicRadio .radio {
    display: flex;
    align-items: center;
  }

  .publicRadio .radio+.radio {
    margin-left: 10px;
  }
</style>
@endpush
@endonce
@elseif ($type=='releases')
<div class="publicFlex">
  <label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
  <div class="input">
    <div class="publicRadio">
      <div class="radio">
        <!-- old 錯誤時; isset 更新時; datas來源資料; $releases 預設-->
        <input type="radio" id="y" name="{{ isset($name)?$name:$id }}" value="y"
          @if( old('releases')=='y' || isset($datas) && !empty($datas) && $datas->releases == 'y' || $releases && $releases== 'y')
        checked
        @endif
        >
        <label for="y">使用</label>
      </div>
      <div class="radio">
        <input type="radio" id="n" name="{{ isset($name)?$name:$id }}" value="n"
          @if( old('releases')=='n' || isset($datas) && !empty($datas) && $datas->releases == 'n')
        checked
        @endif
        >
        <label for="n">停用</label>
      </div>
    </div>
    @error($id)
    <div class="puplicError">{!! $message !!}</div>
    @enderror
  </div>
</div>
@elseif ($type=='gender')
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <select name="gender">
    <option
      value="m"
      @if( old($id)=="m" || isset($datas) && $datas->$id == "m")
      selected
      @endif
      >男</option>
    <option
      value="w"
      @if( old($id)=="w" || isset($datas) && $datas->$id == "w")
      selected
      @endif
      >女</option>
    <option
      value="n"
      @if( old($id)=="n" || isset($datas) && $datas->$id == "n")
      selected
      @endif
      >不想說</option>
  </select>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='select')
{{-- 使用範例 @include('layouts.input',['type'=>'select','id'=>'case_source','label'=>'個案來源','require'=>true,'options'=>array('1'=>'1','2'=>'2')]) --}}
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <select name="{{ isset($name)?$name:$id }}">
    @foreach ($options as $value => $name)
    <option
      value="{{$value}}"
      @if( old($id)==$value || isset($datas) && $datas->$id == $value)
      selected
      @endif
      >{{$name}}</option>
    @endforeach
  </select>
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='textarea')
<label>{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <textarea
    id="{{$id}}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="{{ isset($place)?$place:'' }}"
    required="{{isset($require)?'required':''}}">{{ old($id)?old($id):(!$errors->any() && isset($datas)?$datas->$id:'') }}</textarea>
  @error($id)
  <div class="puplicError">{{ $message }}</div>
  @enderror
</div>
@elseif ($type=='captcha')
<label for="{{ $id }}" class="label">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="inputDiv">
  <div class="input">
    <input
      type="{{ $type }}"
      id="{{ $id }}"
      name="{{ isset($name)?$name:$id }}"
      placeholder="請輸入{{ isset($place)?$place:$label }}">
    @error($id)
    <div class="puplicError">{!! $message !!}</div>
    @enderror
  </div>
  <div class="img">
    <img src="{{ captcha_src() }}" onclick="this.src='{{ captcha_src() }}'+Math.random() ">
  </div>
</div>
@elseif ($type=='password')
{{-- html --}}
<label for="{{ $id }}" class="label">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <i class="puplicPasswordEye" onclick="puplicPasswordEye(this)">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M19.604 2.562l-3.346 3.137c-1.27-.428-2.686-.699-4.243-.699-7.569 0-12.015 6.551-12.015 6.551s1.928 2.951 5.146 5.138l-2.911 2.909 1.414 1.414 17.37-17.035-1.415-1.415zm-6.016 5.779c-3.288-1.453-6.681 1.908-5.265 5.206l-1.726 1.707c-1.814-1.16-3.225-2.65-4.06-3.66 1.493-1.648 4.817-4.594 9.478-4.594.927 0 1.796.119 2.61.315l-1.037 1.026zm-2.883 7.431l5.09-4.993c1.017 3.111-2.003 6.067-5.09 4.993zm13.295-4.221s-4.252 7.449-11.985 7.449c-1.379 0-2.662-.291-3.851-.737l1.614-1.583c.715.193 1.458.32 2.237.32 4.791 0 8.104-3.527 9.504-5.364-.729-.822-1.956-1.99-3.587-2.952l1.489-1.46c2.982 1.9 4.579 4.327 4.579 4.327z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 7l-3.36-2.171c-.405.625-.64 1.371-.64 2.171 0 2.209 1.791 4 4 4s4-1.791 4-4-1.791-4-4-4c-.742 0-1.438.202-2.033.554l2.033 3.446z"></path>
    </svg>
  </i>
  <input
    type="{{ $type }}"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="請輸入{{ isset($place)?$place:$label }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas) && !empty($datas)?$datas->$id:'') }}">
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
{{-- css --}}
@once
@push('customStyle')
<style>
  .puplicPasswordEye {
    position: absolute;
    right: 12px;
    top: 13px;
    cursor: pointer;
  }

  .puplicPasswordEye svg {
    fill: #777;
  }

  .puplicPasswordEye.active svg:nth-child(1),
  .puplicPasswordEye svg:nth-child(2) {
    display: none;
  }

  .puplicPasswordEye.active svg:nth-child(2) {
    display: block;
  }
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
  window.puplicPasswordEye = function(obj) {
    var input = obj.nextSibling.nextSibling;
    if (obj.classList.contains('active')) {
      obj.classList.remove('active');
      input.setAttribute('type', 'password');
    } else {
      obj.classList.add('active');
      input.setAttribute('type', 'text');
    }
  }
</script>
@endpush
@endonce
@elseif ($type=='number')
<label for="{{ $id }}" class="label">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <input
    type="number"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="{{ isset($place)?$place:'' }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas) && !empty($datas)?$datas->$id:'') }}"
    pattern="^[0-9\s]*"
    required="{{isset($require)?'required':''}}">
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='phone' || $type=='tel')
<label for="{{ $id }}" class="label">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <input
    type="tel"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="{{ isset($place)?$place:'' }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas) && !empty($datas)?$datas->$id:'') }}"
    required="{{isset($require)?'required':''}}">
  <!-- pattern="^09[0-9]{8}" -->
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@elseif ($type=='text' || $type=='email')
<label for="{{ $id }}" class="label">{{ $label }}@if(isset($require))<span class="puplicRequired">*</span>@endif</label>
<div class="input">
  <input
    type="{{ $type }}"
    id="{{ $id }}"
    name="{{ isset($name)?$name:$id }}"
    placeholder="{{ isset($place)?$place:'' }}"
    value="{{ old($id)?old($id):(!$errors->any() && isset($datas) && !empty($datas)?$datas->$id:'') }}"
    required="{{isset($require)?'required':''}}">
  @error($id)
  <div class="puplicError">{!! $message !!}</div>
  @enderror
</div>
@endif