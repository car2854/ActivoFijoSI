
<div class="card-title">
  <h4>Ultimas actividades</h4>
</div>
<div class="recent-comment">

  <div class="media">
      <div class="media-body">

        @foreach ($consulta as $c)

        <div class="media">
            <div class="media-body">
              <p>{{ $c->accion }}. </p>
              <p class="comment-date">{{ $c->fechaAccion }}</p>
            </div>
        </div>

        @endforeach

      </div>
  </div>

</div>
