<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require 'studentContainer.php'; ?>



<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Graduate Exit Survey</h4></div>

    <form class="w3-container" action="addGes.php" method="POST">
        <div class="w3-section">
        <div class="w3-container w3-half">
            <label><b>Roll Number</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="10" name="rollnumber" required>
        </div>
        <div class="w3-container w3-half">
            <label><b>Higher Studies Test</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="50" name="higher_studies_test" required>  
        </div>
        <div class="w3-container w3-half">
            <label><b>Higher Studies Score</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="50" name="higher_studies_score" required>  
        </div>
        <div class="w3-container w3-half">
            <label><b>Placement Details</b>(Companies placed)</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="250" name="placement_info" required> 
        </div>
            <style>
                    table, th, td {
                      border:1px solid black;
                    }
            </style>

    <h2>Services</h2>

    <table style="width:100%" required>
      <tr>
        <th>Services</th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Poor</th>
      </tr>
      <tr>
            <td>Admin Offices</td>
        <td><input type="radio" id="excellent" name="administration" value="5" required></td>
        <td><input type="radio" id="Very good" name="administration" value="4"></td>
        <td><input type="radio" id="good" name="administration" value="3"></td>
        <td><input type="radio" id="average" name="administration" value="2"></td>
        <td><input type="radio" id="poor" name="administration" value="1"></td>
      </tr>
       <tr>
        <td>Placement Training</td>
        <td><input type="radio" id="excellent" name="training_placement" value="5" required></td>
        <td><input type="radio" id="Very_good" name="training_placement" value="4"></td>
        <td><input type="radio" id="good" name="training_placement" value="3"></td>
        <td><input type="radio" id="average" name="training_placement" value="2"></td>
        <td><input type="radio" id="poor" name="training_placement" value="1"></td>
      </tr>
       <tr>
        <td>Exam cell</td>
        <td><input type="radio" id="excellent" name="exam_cell" value="5" required></td>
        <td><input type="radio" id="Very_good" name="exam_cell" value="4"></td>
        <td><input type="radio" id="good" name="exam_cell" value="3"></td>
        <td><input type="radio" id="average" name="exam_cell" value="2"></td>
        <td><input type="radio" id="poor" name="exam_cell" value="1"></td>
      </tr>
      <tr>
        <td>Non-Teaching Faculty</td>
        <td><input type="radio" id="excellent" name="non_teaching" value="5" required></td>
        <td><input type="radio" id="Very_good" name="non_teaching" value="4"></td>
        <td><input type="radio" id="good" name="non_teaching" value="3"></td>
        <td><input type="radio" id="average" name="non_teaching" value="2"></td>
        <td><input type="radio" id="poor" name="non_teaching" value="1"></td>
      </tr>
       <tr>
        <td>Ambience</td>
        <td><input type="radio" id="excellent" name="ambience" value="5" required></td>
        <td><input type="radio" id="Very_good" name="ambience" value="4"></td>
        <td><input type="radio" id="good" name="ambience" value="3"></td>
        <td><input type="radio" id="average" name="ambience" value="2"></td>
        <td><input type="radio" id="poor" name="ambience" value="1"></td>
      </tr>
       <tr>
            <td>Discipline</td>
        <td><input type="radio" id="excellent" name="discipline" value="5" required></td>
        <td><input type="radio" id="Very_good" name="discipline" value="4"></td>
        <td><input type="radio" id="good" name="discipline" value="3"></td>
        <td><input type="radio" id="average" name="discipline" value="2"></td>
        <td><input type="radio" id="poor" name="discipline" value="1"></td>
      </tr>
    </table>

    <h2>Facilities</h2>

    <table style="width:100%" required>
      <tr>
        <th>Facilities</th>
        <th>Excellent</th>
         <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Poor</th>
      </tr>
      <tr>
            <td>Library</td>
        <td><input type="radio" id="excellent" name="library" value="5" required></td>
        <td><input type="radio" id="Very_good" name="library" value="4"></td>
        <td><input type="radio" id="good" name="library" value="3"></td>
        <td><input type="radio" id="average" name="library" value="2"></td>
        <td><input type="radio" id="poor" name="library" value="1"></td>
      </tr>
       <tr>
        <td>Amenties</td>
        <td><input type="radio" id="excellent" name="amenties" value="5" required></td>
        <td><input type="radio" id="Very_good" name="amenties" value="4"></td>
        <td><input type="radio" id="good" name="amenties" value="3"></td>
        <td><input type="radio" id="average" name="amenties" value="2"></td>
        <td><input type="radio" id="poor" name="amenties" value="1"></td>
      </tr>
       <tr>
        <td>Infrastructures / Labs</td>
        <td><input type="radio" id="excellent" name="labs" value="5" required></td>
        <td><input type="radio" id="Very_good" name="labs" value="4"></td>
        <td><input type="radio" id="good" name="labs" value="3"></td>
        <td><input type="radio" id="average" name="labs" value="2"></td>
        <td><input type="radio" id="poor" name="labs" value="1"></td>
      </tr>
      <tr>
        <td>Classrooms</td>
        <td><input type="radio" id="excellent" name="classrooms" value="5" required></td>
        <td><input type="radio" id="Very_good" name="classrooms" value="4"></td>
        <td><input type="radio" id="good" name="classrooms" value="3"></td>
        <td><input type="radio" id="average" name="classrooms" value="2"></td>
        <td><input type="radio" id="poor" name="classrooms" value="1"></td>
      </tr>
      <tr>
        <td>Medical Facilities</td>
        <td><input type="radio" id="excellent" name="medical_facililty" value="5" required></td>
        <td><input type="radio" id="Very_good" name="medical_facililty" value="4"></td>
        <td><input type="radio" id="good" name="medical_facililty" value="3"></td>
        <td><input type="radio" id="average" name="medical_facililty" value="2"></td>
        <td><input type="radio" id="poor" name="medical_facililty" value="1"></td>
      </tr>

    </table>



    <br><br>
    <div class="container">    
      <table class="table table-bordered" required>
        <thead>
        <tr>
        <td colspan="7"><center><b>Evaluation of Programme Effectiveness</b></center></td></tr>
        <tr>
        <td colspan="7">As a graduate,I able to</td>
        </tr>
          <tr>
            <th>S.No</th>
            <th>Parameters</th>
            <th>Strongly agree</th>
            <th>Agree</th>
            <th>Neutral</th>
            <th>Disagree</th>
            <th>Strongly Disagree</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Identify, formulate and analyze complex 
    engineering problems by applying knowledge in basic
    sciences, 
    interdisciplinary subjects and core subjects.
    </td>
            <td><input type="radio" id=5 name="pe1" value=5 required></td>
            <td><input type="radio" id=4 name="pe1" value=4></td>
            <td><input type="radio" id=3 name="pe1" value=3></td>
            <td><input type="radio" id=2 name="pe1" value=2></td>
            <td><input type="radio" id=1 name="pe1" value=1></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Comprehend the knowledge to design and 
    develop the solutions for complex problems that meet the
    specified 
    needs of societal, cultural, safety and environmental issues.
    </td>
            <td><input type="radio" id="5" name="pe2" value=5 required></td>
            <td><input type="radio" id="4" name="pe2" value=4></td>
            <td><input type="radio" id="3" name="pe2" value=3></td>
            <td><input type="radio" id="2" name="pe2" value=2></td>
            <td><input type="radio" id="1" name="pe2" value=1></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Apply research based approach using innovative 
    tools and techniques in the various fields of Engineering.

    </td>
            <td><input type="radio" id="5" name="pe3" value=5 required></td>
            <td><input type="radio" id="4" name="pe3" value=4></td>
            <td><input type="radio" id="3" name="pe3" value=3></td>
            <td><input type="radio" id="2" name="pe3" value=2></td>
            <td><input type="radio" id="1" name="pe3" value=1></td>
          </tr>
          <tr>
            <td>4</td>
            <td>Demonstrate the knowledge of the engineering and
    management principles while working individually or as a
    team.
    </td>
            <td><input type="radio" id="5" name="pe4" value=5 required></td>
            <td><input type="radio" id="4" name="pe4" value=4></td>
            <td><input type="radio" id="3" name="pe4" value=3></td>
            <td><input type="radio" id="2" name="pe4" value=2></td>
            <td><input type="radio" id="1" name="pe4" value=1></td>
          </tr>
          <tr>
            <td>5</td>
            <td>Communicate effectively in both verbal and written 
    form to develop intrapersonal and interpersonal skills

            </td>
            <td><input type="radio" id="5" name="pe5" value=5 required></td>
            <td><input type="radio" id="4" name="pe5" value=4></td>
            <td><input type="radio" id="3" name="pe5" value=3></td>
            <td><input type="radio" id="2" name="pe5" value=2></td>
            <td><input type="radio" id="1" name="pe5" value=1></td>
          </tr>
          <tr>
            <td>6</td>
            <td>Develop competencies through self-education for lifelong
    learning
    </td>
            <td><input type="radio" id="5" name="pe6" value=5 required></td>
            <td><input type="radio" id="4" name="pe6" value=4></td>
            <td><input type="radio" id="3" name="pe6" value=3></td>
            <td><input type="radio" id="2" name="pe6" value=2></td>
            <td><input type="radio" id="1" name="pe6" value=1></td>
          </tr>
          <tr>
            <td>7</td>
            <td>Secure employment or be an entrepreneur with ability 
    to apply professional knowledge with ethical responsibility
    </td>
            <td><input type="radio" id="5" name="pe7" value=5 required></td>
            <td><input type="radio" id="4" name="pe7" value=4></td>
            <td><input type="radio" id="3" name="pe7" value=3></td>
            <td><input type="radio" id="2" name="pe7" value=2></td>
            <td><input type="radio" id="1" name="pe7" value=1></td>
          </tr>
          <tr>
            <td>8</td>
            <td>Acquire knowledge to pursue higher studies if I want 
    </td>
            <td><input type="radio" id="5" name="pe8" value=5 required></td>
            <td><input type="radio" id="4" name="pe8" value=4></td>
            <td><input type="radio" id="3" name="pe8" value=3></td>
            <td><input type="radio" id="2" name="pe8" value=2></td>
            <td><input type="radio" id="1" name="pe8" value=1></td>
          </tr>
        </tbody>
      </table>
</div>
<br><br>
<div class="container">    
  <table class="table table-bordered" required>
    <thead>
    <tr>
    <td colspan="3"><center><b>Additional Information</b></center></td></tr>
      <tr>
        <th width=5%>S.No</th>
        <th width=55%>Parameters</th>
        <th width=40%></th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Are there any other skills or knowledge you would 
like to have, the UG programme offer, to current 
students to ensure their preparedness for 
employment and/ or higher studies? If YES, please
specify
</td>
        <td><p><textarea class="w3-input" placeholder="" required></textarea></p></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Total number of courses or training programs taken 
during the programme 
</td>
        <td><p><textarea class="w3-input" placeholder="no_special_chars" name="training_program" required></textarea></p></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Total number of conferences, workshops, professional 
meetings etc. attended  
</td>
        <td><p><textarea class="w3-input" placeholder="number only" name="workshop" required></textarea></p></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Total number of sports and cultural activities
participated  
</td>
        <td><p><textarea class="w3-input" placeholder="no_special_chars" name="sports" required></textarea></p></td>
      </tr>
      <tr>
        <td>5</td>
        <td>Specify details regarding your achievements in 
curricular / non-curricular activities 
</td>
        <td><p><textarea class="w3-input" placeholder="" name="achievement" required></textarea></p></td>
      </tr>
      
    </tbody>
  </table>
</div>
<br><br>
<div class="container">    
  <table class="table table-bordered" required>
    <thead>
    <tr>
    <td colspan="3"><center><b>Answer the Following with a Statement
</b></center></td></tr>
      <tr>
        <th width=5%>S.No</th>
        <th width=55%>Parameters</th>
        <th width=40%></th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mention one value that you
picked up in BVRITH
</td>
        <td><p><textarea class="w3-input" placeholder="" name="bvrith_pickedup" required></textarea></p></td>
      </tr>
      <tr>
        <td>2</td>
        <td>What you liked the most in
BVRITH?
</td>
<td><p><textarea class="w3-input" placeholder="" name="bvrith_like_most" required></textarea></p></td>
      </tr>
      
    </tbody>
  </table>
</div>
<br><br>

<div class="container">    
  <table class="table table-bordered">
    <thead>
    <tr>
    <td colspan="5"><center><b>Pls Rate the Following
</b></center></td></tr>
      <tr>
        <th width=5%>S.No</th>
        <th widht=20%>Parameters</th>
        <th width=20%>Very Good</th>
        <th width=20%>Good</th>
        <th width=20%>Moderate</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Principal
</td>
<td><center><input type="radio" id="Very Good" name="principal" value="3" required></center></td>
        <td><center><input type="radio" id="Good" name="principal" value="2"></center></td>
        <td><center><input type="radio" id="Moderate" name="principal" value="1"></center></td>
      </tr>
      <tr>
        <td>2</td>
        <td>HOD
</td>
        <td><center><input type="radio" id="Very Good" name="hod" value="3" required></center></td>
        <td><center><input type="radio" id="Good" name="hod" value="2"></center></td>
        <td><center><input type="radio" id="Moderate" name="hod" value="1"></center></td>
      </tr>
      <tr>
          <td>3</td>
      <td>Teaching Faculty</td>
      <td><center><input type="radio" id="Very Good" name="teaching" value="3" required></center></td>
<td><center><input type="radio" id="Good" name="teaching" value="2"></center></td>
<td><center><input type="radio" id="Moderate" name="teaching" value="1"></center></td>
    
        </tr>
      
    </tbody>
  </table>
</div>
<br>
<p><b>Overall Rating</b></p>
  <input type="radio" id="5" name="overall" value="5" required>
  <label for="very_satisfied">Highly Satisfied</label><br>
  <input type="radio" id="4" name="overall" value="4">
  <label for="satisfied">Satisfied</label><br>
  <input type="radio" id="3" name="overall" value="3">
  <label for="neutral">Neutral</label><br>
  <input type="radio" id="3" name="overall" value="2">
  <label for="d_satisfied">Dissatisfied</label><br>
  <input type="radio" id="2" name="overall" value="1">
  <label for="vd_satisfied">Highly Dissatisfied</label><br><br>
  <label><b>PG Admission Details</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="150" name="pg_admission_det">
   
    <label><b>Improvements</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="50" name="improvements" required>  
    <label><b>Suggestions</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="250" name="suggestions" required>  
    
<!--  <label><b>Survey Date</b></label>
    <input class="w3-input w3-border w3-margin-bottom" type="date" placeholder="" maxlength="50" name="survey_date" required>-->
<input type="hidden" id="date" value="<?php echo date("d-m-Y"); ?>" name="survey_date">
  <p><button class="w3-btn w3-black">Submit</button></p>
  
  
   
   
 
</div>
 </form>

<br><br><br><br><br><br>

<?php require '../footer.php'; ?>

     
</body>
</html> 
<?php
}else{
    echo header("Location:index.php");
}
?>