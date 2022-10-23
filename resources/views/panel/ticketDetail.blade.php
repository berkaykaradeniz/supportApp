@include('panel.includes.header')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" id="ticket_title">Ticket List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <h2 id="ticket_id">Ticket ID: </h2>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <h2 id="user_id">Ticket User ID : </h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div id="ticket_description"> 
          Ticket Detail
        </div>
        <h1> Answers</h1>
        <hr>
        <div id="ticket_answers"> 
        </div>
          <hr>
        <div class="newAnswer">
        <textarea class="form-control" id="answer" rows="3" placeholder="Answer"></textarea>
        <button class="btn btn-primary mt-5" onclick='sendTicketAnswer();'>Send Answer</button>

        </div>
    </main>
  </div>
</div>


<script>
getTicketDetails();
listAnswers();


</script>

@include('panel.includes.footer')