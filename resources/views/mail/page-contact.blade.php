<h2>{{$subject}}</h2>


<strong>Name</strong>:
 {{$data['contact'] -> name}}<br/>
<strong>Email</strong>: {{$data['contact'] -> email}}<br/>
<strong>Phone</strong>: {{$data['contact'] -> phone}}<br/>
<strong>Submit from</strong>: <a href="{{$data['contact'] -> url}}">{{$data['contact'] -> url}}</a><br/>
<strong>Message</strong>: {{$data['contact'] -> message}}<br/>
<?php if ($data['contact'] -> ip != "") { ?>
<strong>Sent from IP Address</strong>: {{$data['contact'] -> ip}}<br/>
<?php } ?>

