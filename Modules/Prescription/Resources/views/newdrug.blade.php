<form id="msform">
    {{ csrf_field() }}
   
  	<span class="error" style="display:none;" id="encounterformerror"></span>  
    <input type="text" name="drugname" id="drugname" placeholder="Drug Name" required />
	<select class="form-control" name="medicinetype" id="medicinetype" required>
    	<option value="">Select Medicine Type</option>
    	<option value="1">ARV</option>
    	<option value="2">Non-ARV</option>
    </select>
    <input type="text" name="shortname" id="shortname" placeholder="Short Name" required />
    <input type="number" step="0.01" min="0" name="dose" id="dose" placeholder="Dose" required />   
    <select class="form-control" name="preparation" id="preparation" required>
        <option value="">-- Preparation --</option>
        <option value="1">Tablet</option>
        <option value="2">Capsule</option>
        <option value="3">Solution</option>
        <option value="4">Injectible in ampule or vial</option>
        <option value="5">Syrup</option>
        <option value="6">Intravenus</option>
        <option value="7">Cream</option>
        <option value="8">Ointment</option>
        <option value="9">Pessarie</option>
        <option value="10">Drops</option>
        <option value="11">Mixture</option>
        <option value="12">Suppository</option>
    </select>
    <select class="form-control" name="measurement" id="measurement" required>
        <option value="">-- Measurement --</option>
        <option value="1">Milligrams</option>
        <option value="2">Millilitres</option>
        <option value="3">International Units</option>
        <option value="4">Tube</option>
        <option value="5">Micro Units</option>
        <option value="6">Percentage</option>
        <option value="7">Litres</option>
        <option value="8">Kilograms</option>
        <option value="9">Milligrams per Ml</option>
    </select>
    
    <!-- <input type="text" name="navisioncode" id="navisioncode" placeholder="Navision Code"/> -->
    <select class="form-control" name="forsale" id="forsale" required>
        <option value="">Is drug for sale</option>
        <option value="1">Yes</option>
        <option value="2">No</option>
    </select>
     <input type="number" step="0.01" min="0" name="unitprice" id="unitprice" placeholder="Unit Price"/>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savedrug" class="action-button" value="Save" id="savedrug" />
    </div>
</form>
