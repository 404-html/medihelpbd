// blank controller
blood_bank.controller('BloodBankDoctorEditController', BloodBankDoctorEditController);

function BloodBankDoctorEditController($scope, $http) {

    var blood_bank_doctor_id = document.getElementsByName('blood_bank_doctor_id')[0].value;

    console.log(blood_bank_doctor_id);

    $http
        .get(window.location.origin+"/medical-department/api/blood-bank/get-selected-department/" + blood_bank_doctor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.departments;
            selected_department = response.data.selected_department;

            $('#department_id').kendoDropDownList({
                optionLabel   : "Select Department",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#department_id").data("kendoDropDownList");
                dropdownlist.value(selected_department);

        });


        $http
        .get(window.location.origin+"/medical-specialist/api/blood-bank/get-selected-medical-specialist/" + blood_bank_doctor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            selected_Medical_specialist = response.data.selected_Medical_specialist;
            data = response.data.medical_specialists;
            $('#medical_specialist_id').kendoDropDownList({
                optionLabel   : "Select Doctor",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#medical_specialist_id").data("kendoDropDownList");
                dropdownlist.value(selected_Medical_specialist);

        });


        $scope.getDoctor = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log(data);
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "Select Doctor",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        }

}