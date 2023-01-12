<style>
    body {
        background-color: #d6d6d6;
        font-weight: 600;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .ticket {
        width: 400px;
        height: 775px;
        background-color: white;
        margin: 25px auto;
        position: relative;
    }

    .holes-top {
        height: 50px;
        width: 50px;
        background-color: #d6d6d6;
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
        background-color: #d6d6d6;
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
        background-color: #d6d6d6;
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
    }

    .cinema {
        color: #aaa;
        font-size: 22px;
    }

    .movie-title {
        font-size: 50px;
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
        font-size: 16px;
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
        <p class="cinema">{{ $event->category->name }}</p>
        <p class="movie-title">{{ $event->title }}</p>
    </div>
    <div class="poster">
        <img src="{{ asset('storage/' . $event->image) }}" alt="Movie: Only God Forgives" />
    </div>
    <div class="info">
        <table>
            <tr>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
            </tr>
            <tr>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
            </tr>
        </table>
    </div>
    <div class="holes-lower"></div>
    <div class="serial">
        <table class="barcode">
            <tr class="awik"></tr>
        </table>
        <table class="numbers">
            <tr>
                <td>9</td>
                <td>1</td>
                <td>7</td>
                <td>3</td>
                <td>7</td>
                <td>5</td>
                <td>4</td>
                <td>4</td>
                <td>4</td>
                <td>5</td>
                <td>4</td>
                <td>1</td>
                <td>4</td>
                <td>7</td>
                <td>8</td>
                <td>7</td>
                <td>3</td>
                <td>4</td>
                <td>1</td>
                <td>4</td>
                <td>5</td>
                <td>2</td>
            </tr>
        </table>
    </div>
</div>
<script>
    var code =
        '11010010000100111011001011101111011010001110101110011001101110010010111101110111001011001001000011011000111010110001001110111101101001011010111000101101'
    table = document.querySelector('.awik')
    for (var i = 0; i < code.length; i++) {
        if (code[i] == 1) {
            table.append('<td bgcolor="black">')
        } else {
            table.append('<td bgcolor="white">')
        }
    }
</script>
