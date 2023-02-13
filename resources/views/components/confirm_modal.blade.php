<div class="confirm">
    <div class="modal">
        <div href="{{$url}}"class="message noselect" style="font-size: 16px">
            {{$message}}
        </div>
        <div class="buttons noselect">
            <a href="{{$url}}" class="action">
                {{$slot}}
            </a>
            <div class="voltar">
                Voltar
            </div>
        </div> 
    </div>
</div>