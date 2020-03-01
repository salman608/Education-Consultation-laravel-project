@extends('layouts.frontend')
@section('content')

<br>
<div class="card">
  <div class="card-header">

    <div class="row">
      <div class="col-4"></div>
      <div class="col-4 text-center" >
         <button type="button" name="button" class="btn btn-primary" style="font-size:20px;margin: auto;">About Teacher</button> </div>
         <!-- <h2 style="color:blue;">About Teacher</h2>
         <hr style="width:90%;float: left;border-bottom:2px solid green;"> -->


      <div class="col-4">
        <img src="assets/images/logo2.jpg" alt="" style="width: 150px;height: 55px; float: right;">
      </div>
     </div>
     <div class="row">
       <div class="col-4"></div>
       <div class="col-4"></div>
       <div class="col-4"> <p style="float:right;margin-right: 7px;font-weight:bold;"><i class="fas fa-phone-volume" style="color:green;font-size:18px;"></i> 01707116460</p></div>

     </div>



     <div class="row">

       <!-- tutor profile picture -->
       <div class="col-md-4">
             <img src="assets/images/demo2.jpg" alt="Shakhawat Hossen" class="img-thumbnail mx-auto d-block mt-3" style="height:200px;margin:auto;border:2px solid green;width: 165px;">
             <small class="ml-4"><i class="fa fa-clock-o"></i> Member Since: 2019-11-06 12:33:56</small>
       </div>

        <!-- tutor about  strat -->
         <div class="col-md-7 mt-3">
                 <div class="row">
                      <div class="col-4">Name:</div>
                      <div class="col-7"><h4>Salman Rahman</h4> </div>
                 </div>
                 <div class="row mt-1">
                      <div class="col-4">ID:</div>
                      <div class="col-7"><h6>TR-775</h6></div>
                 </div>

                 <div class="row mt-1">
                     <div class="col-4">Gender:</div>
                     <div class="col-7"><h6>Male</h6></div>
                  </div>

                  <div class="row mt-2">
                     <div class="col-4">Qualification:</div>
                     <div class="col-7"><h6>Honours</h6></div>
                  </div>
                  <div class="row mt-2">
                     <div class="col-4">Institute:</div>
                     <div class="col-7"><h6>DAffodil International University</h6></div>
                  </div>
                   <div class="row mt-2">
                      <div class="col-4">Present Location: </div>
                      <div class="col-7"> Road 6, Housing limited, Mohammapur</div>
                   </div>
                   <div class="row mt-2">
                      <div class="col-4">Experiences: </div>
                      <div class="col-7"> 2 Years</div>
                   </div>



          </div>    <!-- tutor about  End -->



     </div>



    <div class="card-body">
      <div class="col">
        <button type="button" name="button" class="btn btn-success" style="width: 100%">Educational Qualification</button>
        <table class="table table-bordered mt-3">
          <thead class="thead-custom">
            <tr>
              <th>Exam Name</th>
              <th>Year</th>
              <th>Institute</th>
              <th>Group/Subject</th>
              <th>Result</th>
            </tr>
          </thead>
           <tbody>
             <tr>
               <td>Ssc</td>
               <td>2012</td>
               <td>Bhola Govt High School</td>
                <td>Business Studies </td>
                 <td>5.00</td>
               </tr>
               <tr>
                 <td>Hsc</td>
                 <td>2014</td>
                 <td>Jessore Cantonment School &amp; College</td>
                 <td>Business Studies </td>
                 <td>5.00</td>

              </tr>
              <tr>
                <td>Honours</td>
                <td>2020</td>
                <td>IBA- Jahangirnagar University</td>
                <td>BBA Major jn Marketing </td>
                <td>3.49</td>
              </tr>
            </tbody>
          </table>
        </div>




      <div class="row mt-2">
        <div class="col">
          <button type="button" name="button" class="btn btn-success" style="width:100%; ">Tution More Information</button>
          <table class="table">
            <!-- <thead class="thead-custom">
               <tr>
                  <th scope="col">Tution Info</th>
                  <th scope="col"></th>
              </tr>
              </thead> -->
             <tbody>
                <tr>
                   <th scope="row" style="width:40%">Expected Minimum Salary</th>
                   <td style="width:70%">8000 Tk/Month</td>
                </tr>
                <tr>
                   <th scope="row">Current Status for Tuition</th>
                   <td>Available</td>
                 </tr>
                 <tr>
                   <th scope="row">Days Per Week</th>
                   <td colspan="">3 Days/Week, 4 Days/Week</td>
                 </tr>
                 <tr>
                   <th scope="row">Preffered Tution Style</th>
                   <td>Group Tuition, Private Tuition</td>
                 </tr>
                 <tr>
                   <th scope="row">Place of Learning</th>
                   <td>Home Visit</td>
                 </tr>
                 <tr>
                   <th scope="row">Extra Facilities</th>
                   <td colspan="2">Phone help</td>
                 </tr>
                 <tr>
                   <th scope="row">Preffered Medium of Version</th>
                   <td>Bangla Medium, English Version</td></tr>
                 <tr>
                   <th scope="row">Preffered Class </th>
                   <td>Class 9, SSC, HSC-1st YEAR, HSC-2nd YEAR</td></tr>
                 <tr>
                   <th scope="row">Preffered Subjects</th>
                   <td colspan="2">English, Accounting, Finance &amp; Banking, Management, English Literature, Commerce, Commerce Related all</td>
                 </tr>
                 <tr>
                   <th scope="row">Preferred Time</th>
                   <td colspan="2">Afternoon, evening</td>
                 </tr>
                 <tr>
                   <th scope="row">Preffered Area to Teach</th>
                   <td colspan="2">Dhaka ,<br> Asad Gate, kallanpur, Mirpur, Mohamadpur, shekhertek</td>
                 </tr>
            </tbody>
          </table>
        </div>
    </div>
    </div>
      
  </div>

      </div>




@endsection
