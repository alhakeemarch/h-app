@extends('layouts.print')
@section('title', 'تفويض')
@section('content')
{{-- <div class="page" style="height: 2.97cm; width:0.21cm;"> --}}
{{-- <div class="page content" style="height: 1200px; width:800px;"> --}}
<div class="page container-fluid">
    <header>
        {{-- <img src="{{URL::asset('/img/header.jpg')}}" alt="hedder" style="height: auto; width: 800px;"> --}}
        <img src="{{URL::asset('/img/header.jpg')}}" alt="hedder" class=" w-100">
    </header>
    <main>
        <section>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id blanditiis minima quo itaque sapiente ea,
                dolorem at unde magni, odio eius fugit. Ullam quasi delectus dicta dolor eligendi exercitationem sunt
                voluptas tenetur, temporibus quos fugiat excepturi eveniet officiis pariatur numquam illum dolores a cum
                similique culpa, veritatis eaque voluptate cumque! Porro nesciunt dignissimos eius in assumenda maxime
                quia et, possimus nemo vitae at enim, id praesentium nobis nisi officiis eligendi veniam similique
                nostrum? Beatae saepe magni esse accusamus consectetur enim, odio maiores velit blanditiis culpa
                possimus modi deleniti adipisci, libero explicabo commodi labore quas numquam, vel voluptatum neque
                dolorem incidunt recusandae. Cupiditate, corporis ex! Hic eos temporibus, tempore velit eaque laborum
                error et molestiae quis dolores mollitia maxime, facilis voluptates nesciunt! Inventore, minus laborum a
                iusto impedit magnam facilis minima aliquid perferendis dolore ducimus nostrum ea quis unde ut vel
                accusamus cumque nisi mollitia amet! Assumenda, aspernatur nisi voluptates fugiat ratione optio?
                Quisquam dolorum molestiae aut accusamus consequuntur, laudantium nemo sunt maxime architecto officiis
                provident dolore dolor doloremque aliquid sint labore repellendus ipsam rem quis placeat ab, quia
                facere. Tempore, nostrum magni! Adipisci, consectetur perferendis. Et voluptatibus incidunt dignissimos
                ducimus natus earum in aliquid sit quaerat iste facilis placeat veniam facere ipsa fugit recusandae
                eveniet non, numquam, odio vel minus voluptates rerum exercitationem repudiandae? Fuga velit assumenda
                dolore voluptatum cumque iusto accusantium, laborum ad, rerum illo ab aliquid blanditiis omnis natus
                mollitia ratione, recusandae voluptate vero quaerat? Porro deleniti molestias culpa cupiditate animi
                quas non commodi reprehenderit assumenda veniam nobis cumque impedit, excepturi corrupti aliquid
                recusandae unde libero quisquam veritatis fugit maxime. Quas rerum asperiores quae nostrum natus
                praesentium blanditiis maxime dolorum, sed optio eaque fuga laborum cum, iure culpa vero itaque libero!
                Atque maxime perspiciatis maiores porro quas tempore, sequi doloremque saepe fuga. Soluta nihil illo
                dolor iste qui!
            </p>

        </section>
        <p>
            كيف وضع اللغة العربية ما أدري
        </p>
        <section>

        </section>
        <section>

        </section>
    </main>
    <footer>
        {{-- <img src="{{URL::asset('/img/footer.jpg')}}" alt="hedder" style="height: auto; width: 800px;"> --}}
        <img src="{{URL::asset('/img/footer.jpg')}}" class=" w-100">
    </footer>
</div>

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection