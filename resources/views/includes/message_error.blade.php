  <div class="message {{$errors->any()?'response':''}} {{session("message")?'response':''}}">
        
                <span>
                    {{$errors->first()}}
                    {{session("message")}}
                </span>

  </div>