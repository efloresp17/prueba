<?php
	
	$tipo=$_POST["tipo"];

	if ($tipo == 1) {
	    echo  
	    		'<h4>Book Information</h4>
	            <div class="margin_between">
	                <div class="input_box space_between">
	                    <label>Publication Date<span>*</span></label>
	                    <input type="date" id="publicationDate" name="publicationDate">
	                </div>
	                <div class="input_box space_between">
	                    <label>Total Pages <span>*</span></label>
	                    <input type="text" id="pages" name="pages">
	                </div>
	            </div>
	            <div class="input_box">
	                <label>ISBN <span>*</span></label>
	                <input type="text" id="isbn" name="isbn">
	            </div>';
	 }else if ($tipo == 2) {
	    echo '
    				<h4>Article Information</h4>
                    <div class="margin_between">
                        <div class="input_box space_between">
                            <label>Publication Date<span>*</span></label>
                            <input type="date" id="publicationDate"name="publicationDate">
                        </div>
                        <div class="input_box space_between">
                            <label>SSN <span>*</span></label>
                           <input type="text" id="ssn" name="ssn">
                       </div>
                    </div>';
	 }else if ($tipo == 3) {
	    echo 
          '<h4>Presentation Information</h4>
            <div class="margin_between">
            <div class="input_box space_between">
                <label>Publication Date<span>*</span></label>
                <input type="date" id="publicationDate" name="publicationDate">
            </div>
            <div class="input_box space_between">
    	            <label>ISBN <span>*</span></label>
     	           <input type="text" id="isbn" name="isbn">
	            </div>
            </div>
            <div class="input_box">
   	 	       <label>Congress Name <span>*</span></label>
   		        <input type="text" id="congressName" name="congressName">
            </div>';
	 }

?>