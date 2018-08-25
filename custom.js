const random = Math.floor(Math.random() * 1000);

var pusher = new Pusher('3df9164881a3cc6ba333', {
    cluster: 'ap2',
    encrypted: true
});

var i = 0;
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    var get_rand = data.rand;
    if (get_rand == random) {

        if (i == 1) {
            pusher.disconnect();
            displayData(data);
        }
        i++;
    }
});

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // Here Do Nothing !!!
    }
};
xhttp.open("GET", "customSocket.php?roll=" + roll + "&pass=" + pass + "&rand=" + random, true);
xhttp.send();

function displayData(dataSet) {
    var template = '' +
        '<tr>' +
        '<td align="center">{{ sub_id }}</td>' +
        '<td align="center">{{ total }}</td>' +
        '<td align="center">{{ attended }}</td>' +
        '<td align="center">{{ percentage }}</td>' +
        '</tr>';
    var template_fotter = '' +
        '<tr>' +
        '<th align="center">{{ sub_id }}</th>' +
        '<th align="center">{{ total }}</th>' +
        '<th align="center">{{ attended }}</th>' +
        '<th align="center">{{ percentage }}</th>' +
        '</tr>';
    Mustache.parse(template);
    var sub_count = 0;
    var ttl_count = 0;
    var att_count = 0;
    dataSet.data.forEach(function(ele) {
        var rendered = Mustache.render(template, {
            sub_id: ele[0],
            total: ele[2],
            attended: ele[1],
            percentage: Math.round(ele[3] * 100) / 100
        });
        $('#target').append(rendered);
        ttl_count = ttl_count + ele[2];
        att_count = att_count + ele[1];
        sub_count++;
    });
    rendered = Mustache.render(template_fotter, {
        sub_id: 'Total',
        total: ttl_count,
        attended: att_count,
        percentage: Math.round(((att_count / ttl_count) * 100) * 100) / 100
    });
    $('#target').append(rendered);
}