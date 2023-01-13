<style>
    body {
        font-weight: 600;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .ticket {
        width: 400px;
        background-color: white;
        margin: 25px auto;
        position: relative;
    }

    .holes-top {
        height: 50px;
        width: 50px;
        background-color: #212529;
        border-radius: 50%;
        position: absolute;
        left: 50%;
        margin-left: -25px;
        top: -25px;
    }

    .holes-top:before,
    .holes-top:after {
        content: '';
        height: 50px;
        width: 50px;
        background-color: #212529;
        position: absolute;
        border-radius: 50%;
    }

    .holes-top:before {
        left: -200px;
    }

    .holes-top:after {
        left: 200px;
    }

    .holes-lower {
        position: relative;
        margin: 25px;
        border: 1px dashed #aaa;
    }

    .holes-lower:before,
    .holes-lower:after {
        content: '';
        height: 50px;
        width: 50px;
        background-color: #212529;
        position: absolute;
        border-radius: 50%;
    }

    .holes-lower:before {
        top: -25px;
        left: -50px;
    }

    .holes-lower:after {
        top: -25px;
        left: 350px;
    }

    .title {
        padding: 50px 25px 10px;
        color: #181818
    }

    .cinema {
        color: #aaa;
        font-size: 22px;
        margin-bottom: 0;
    }

    .movie-title {
        font-size: 40px;
        margin-bottom: 0;
    }

    .info {
        padding: 15px 25px;
    }

    table {
        width: 100%;
        font-size: 18px;
        margin-bottom: 15px;
    }

    table tr {
        margin-bottom: 10px;
    }

    table th {
        text-align: left;
    }

    table th:nth-of-type(1) {
        width: 38%;
    }

    table th:nth-of-type(2) {
        width: 40%;
    }

    table th:nth-of-type(3) {
        width: 15%;
    }

    table td {
        width: 33%;
        font-size: 20px;
        color: #313131
    }

    th {
        color: #313131
    }

    .bigger {
        font-size: 48px;
    }

    .serial {
        padding: 25px;
    }

    .serial table {
        border-collapse: collapse;
        margin: 0 auto;
    }

    .serial td {
        width: 3px;
        height: 50px;
    }

    .numbers td {
        font-size: 16px;
        text-align: center;
    }
</style>
<div class="ticket">
    <div class="holes-top"></div>
    <div class="title">
        <p class="cinema">{{ $ticket->event->category->name }}</p>
        <p class="movie-title">{{ $ticket->event->title }}</p>
    </div>
    <div class="poster">
        @if ($ticket->event->image)
            <img class="img-fluid card-img-top" src="{{ asset('storage/' . $ticket->event->image) }}" class="img-fluid"
                alt="yee">
        @else
            <img class="img-fluid card-img-top"
                src="https://source.unsplash.com/1200x600/?{{ $ticket->event->category->name }}" class="img-fluid"
                alt="yee">
        @endif
    </div>
    <div class="info">
        <table>
            <tr>
                <th colspan="2">Location</th>
                <th colspan="1">Price</th>
            </tr>
            <tr>
                <td colspan="2">{{ $ticket->event->location }}</td>
                <td>{{ $ticket->event->price }}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
            </tr>
            <tr>
                <td>{{ $ticket->event->event_date }}</td>
                <td>{{ $ticket->event->start }}</td>
                <td>{{ $ticket->event->end }}</td>
            </tr>
        </table>
    </div>
    <div class="holes-lower"></div>
    <div class="serial">
        <table class="barcode">
            <tr class="myRow">
            </tr>
        </table>
        <table class="numbers">
            <input type="hidden" id="hidden_id" value="{{ $ticket->barcode }}">
            <tr>
                @for ($i = 0; $i < 22; $i++)
                    <td> {{ $ticket->barcode[$i] }} </td>
                @endfor
            </tr>
        </table>
    </div>
</div>
<script>
    var code = document.getElementById('hidden_id').value
    var binaryCode = ""
    binaryCode = BigInt(code).toString(2)
    console.log(binaryCode)
    table = document.querySelector('.myRow')
    for (var i = 0; i < binaryCode.length; i++) {
        const para = document.createElement("td");
        const att = document.createAttribute("bgColor")
        if (binaryCode[i] == 1) {
            att.value = "black"
        } else {
            att.value = "white"
        }
        para.setAttributeNode(att)
        table.append(para)
    }
</script>
