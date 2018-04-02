$(document).ready(function() {
    $("#company-name-error").parent().hide();
    $("#company-contact-error").parent().hide();
    $("#contact-email-error").parent().hide();
    $("#company-intro-error").parent().hide();
    $("#work-hours-days-error").parent().hide();
    $("#payroll-start-stop-error").parent().hide();
    $("#pay-freq-error").parent().hide();
    $("#pay-holidays-error").parent().hide();
    $("#unlimitted-vaca-error").parent().hide();
    $("#day-hour-vaca-error").parent().hide();
    $("#vaca-sick-error").parent().hide();
    $("#combine-pto-error").parent().hide();
    $("#vaca-approval-error").parent().hide();
    $("#maternity-leave-error").parent().hide();
    $("#paternity-leave-error").parent().hide();
    $("#maternity-pay-error").parent().hide();
    $("#workers-comp-error").parent().hide();
    $("#bereavement-error").parent().hide();
    $("#closing-comments-error").parent().hide();   

    $('#emp_book-submit').on("click", validate);
});




function validate(event) {

    //prevent the form from submitting
    event.preventDefault();
    
    //remove old error messages
    removeErrors();
    
    var isError = false;
    
    //company name
    var companyName = $("#company_name").val();
    if (companyName.length <= 3) {
        report("company-name-error", "Your company name must be more than 3 characters long");
        isError = true;
    } else if(companyName.length > 50) {
        report("company-name-error", "Your company name must be less than 50 characters long");
        isError = true;
    }
    
    //company contact 
    var companyContact = $("#company_contact").val();
    if (companyContact.length <= 3) {
        report("company-contact-error", "Your company contact must be more than 3 characters long");
        isError = true;
    } else if(companyContact.length > 40) {
        report("company-contact-error", "Your company contact must be less than 40 characters long");
        isError = true;
    }

    //contact email
    var companyEmail = $("#company_email").val();
    if (companyEmail.length <= 1) {
        report("contact-email-error", "Your company email must be more than 1 characters long");
        isError = true;
    } else if(companyEmail.length > 50) {
        report("contact-email-error", "Your company email must be less than 50 characters long");
        isError = true;
    }
    
    //company_intro must be 10 characters
    var companyIntro = $("#company_intro").val();
    if (companyIntro.length <= 3) {
        report("company-intro-error", "Your company intro must be more than 3 characters long");
        isError = true;
    } else if(companyIntro.length > 500) {
        report("contact-email-error", "Your company intro must be less than 500 characters long");
        isError = true;
    }
    
    //work_hrs_days must be 10 t0 50 characters
    var workhoursdays = $("#work_hrs_days").val();
    if (workhoursdays.length <= 3) {
        report("work-hours-days-error", "Your company work hours & days must be more than 3 characters long");
        isError = true;
    } else if(workhoursdays.length > 50) {
        report("work-hours-days-error", "Your company work hours & days must be less than 50 characters long");
        isError = true;
    }
    
    //work_hrs_days must be 10 t0 50 characters
    var payrollStartStop = $("#payroll_start_stop").val();
    if (payrollStartStop.length <= 3) {
        report("payroll-start-stop-error", "Your company work hours & days must be more than 3 characters long");
        isError = true;
    } else if(workhoursdays.length > 100) {
        report("payroll-start-stop-error", "Your company work hours & days must be less than 100 characters long");
        isError = true;
    }
    
    //Validate how often will you pay check boxes  
    if(document.getElementById('weekly').checked) {
        //weekly radio box is checked
    } else if(document.getElementById('bimonthly').checked) {
        //bimonthly radio box is checked
    } else if(document.getElementById('monthly').checked) {
        //monthly radio box is checked
    } else if(document.getElementById('every_other_week').checked) {
        //every_other_week radio box is checked
    } else if(document.getElementById('other').checked) {
        //other radio box is checked
    } else {
        report("pay-freq-error", "Please select an option.");
        isError = true; 
    }
        
    //Validate what holidays you will pay for check boxes
    if(document.getElementById('new_years_day').checked) {
        //new_years_day check box is checked
    } else if(document.getElementById('mlkjr_bday').checked) {
        //mlkjr_bday check box is checked
    } else if(document.getElementById('mem_day').checked) {
        //mem_day check box is checked
    } else if(document.getElementById('july4_day').checked) {
        //july4_day check box is checked
    } else if(document.getElementById('labor_day').checked) {
        //labor_day check box is checked
    } else if(document.getElementById('veteran_day').checked) {
        //veteran_day check box is checked
    } else if(document.getElementById('thanks_day').checked) {
        //thanks_day check box is checked
    } else if(document.getElementById('christmas').checked) {
        //christmas check box is checked
    } else {
        report("pay-holidays-error", "Please select an option.");
        isError = true; 
    }
    
    //Validate unlimitted-vaca-error must be checked
    if(document.getElementById('ul_vaca_yes').checked) {
        //if checked yes
    } else if(document.getElementById('ul_vaca_no').checked) {
        //if checked no
    } else {
        report("unlimitted-vaca-error", "Please select an option.");
        isError = true; 
    }
    
    //Validate day_hour_vaca must be checked
    if(document.getElementById('day_vaca').checked) {
        //if checked yes
    } else if(document.getElementById('hour_vaca').checked) {
        //if checked no
    } else {
        report("day-hour-vaca-error", "Please select an option.");
        isError = true; 
    }
    
    //vaca_sick_qty must be 10 characters
    var vacasickqty = $("#vaca_sick_qty").val();
    if (vacasickqty.length <= 3) {
        report("vaca-sick-error", "Your vacation/sick time must be more than 3 characters long");
        isError = true;
    } else if(vacasickqty.length > 100) {
        report("vaca-sick-error", "Your vacation/sick time must be less than 100 characters long");
        isError = true;
    }
    
    //combine_pto must be 10 characters
    var combinepto = $("#combine_pto").val();
    if (combinepto.length <= 3) {
        report("combine-pto-error", "Combine PTO must be more than 3 characters long");
        isError = true;
    } else if(combinepto.length > 100) {
        report("combine-pto-error", "Combine PTO must be less than 100 characters long");
        isError = true;
    }
    
    //vaca-approval-error must be 10 characters
    var vacaapproval = $("#vaca_approval").val();
    if (vacaapproval.length <= 3) {
        report("vaca-approval-error", "Vacation approval procedure must be more than 3 characters long");
        isError = true;
    } else if(vacaapproval.length > 100) {
        report("vaca-approval-error", "Vacation approval procedure must be less than 100 characters long");
        isError = true;
    }
    
    //Validate maternity leave must be checked
    if(document.getElementById('mat_yes').checked) {
        //if checked yes
    } else if(document.getElementById('mat_no').checked) {
        //if checked no
    } else {
        report("maternity-leave-error", "Please select an option.");
        isError = true; 
    }
    
    //Validate paternity leave must be checked
    if(document.getElementById('pat_yes').checked) {
        //if checked yes
    } else if(document.getElementById('pat_no').checked) {
        //if checked no
    } else {
        report("paternity-leave-error", "Please select an option.");
        isError = true; 
    }
    
    //maternity_leave_pay must be 10 characters
    var matleavepay = $("#maternity_leave_pay").val();
    if (matleavepay.length <= 3) {
        report("maternity-pay-error", "Pay for maternity/paternity must be more than 3 characters long");
        isError = true;
    } else if(matleavepay.length > 100) {
        report("maternity-pay-error", "Pay for maternity/paternity must be less than 100 characters long");
        isError = true;
    }
    
    //workers_comp must be 10 characters
    var workerscomp = $("#workers_comp").val();
    if (workerscomp.length <= 3) {
        report("workers-comp-error", "Workers comp must be more than 3 characters long");
        isError = true;
    } else if(workerscomp.length > 100) {
        report("workers-comp-error", "Workers comp must be less than 100 characters long");
        isError = true;
    }
    
    //bereavement_time must be 10 characters
    var bereavetime = $("#bereavement_time").val();
    if (bereavetime.length <= 3) {
        report("bereavement-error", "Bereavement time must be more than 3 characters long");
        isError = true;
    } else if(bereavetime.length > 100) {
        report("bereavement-error", "Bereavement time must be less than 100 characters long");
        isError = true;
    }
    
    //other_comments must be 10 characters
    var othercomment = $("#other_comments").val();
    if (othercomment.length <= 10) {
        report("closing-comments-error", "Closing comments must be more than 10 characters long");
        isError = true;
    } else if(othercomment.length > 500) {
        report("closing-comments-error", "Closing comments must be less than 500 characters long");
        isError = true;
    }
    
    
    /*******************************************************************
    //hours must be numeric and between 1-100
    var hours = parseInt($('#hours').val());
    if (!Number.isInteger(hours)) {
        report("hours-error", "hours must be numeric");
        isError = true;
    } else if (hours < 1 || hours > 100) {
        report("hours-error", "hours must be between 1-100");
        isError = true;
    }
    
    //rate must be numeric and positive
    var rate = parseInt($('#payrate').val());
    if (!Number.isInteger(rate)) {
        report("payrate-error", "rate must be numeric");
        isError = true;
    } else if (rate < 0) {
        report("payrate-error", "rate must be positive");
        isError = true;
    }
    **********************************************************************/
    
    //submit the form now that all data is good
    if (!isError) {
        $('#handbook_form').submit();
    }
}

function report(id, message)
{
    $("#" + id).html(message);
    $("#" + id).parent().show();
}

function removeErrors()
{
    $("#company-name-error").parent().hide();
    $("#company-contact-error").parent().hide();
    $("#contact-email-error").parent().hide();
    $("#company-intro-error").parent().hide();
    $("#work-hours-days-error").parent().hide();
    $("#payroll-start-stop-error").parent().hide();
    $("#pay-freq-error").parent().hide();
    $("#pay-holidays-error").parent().hide();
    $("#unlimitted-vaca-error").parent().hide();
    $("#day-hour-vaca-error").parent().hide();
    $("#vaca-sick-error").parent().hide();
    $("#combine-pto-error").parent().hide();
    $("#vaca-approval-error").parent().hide();
    $("#maternity-leave-error").parent().hide();
    $("#paternity-leave-error").parent().hide();
    $("#maternity-pay-error").parent().hide();
    $("#workers-comp-error").parent().hide();
    $("#bereavement-error").parent().hide();
    $("#closing-comments-error").parent().hide();
   
    $("#vaca-sick-pto-error").parent().hide();
    
   
    
    
    
    
}