eye_bank.controller('EyeBankController', EyeBankController);

function EyeBankController($scope, $http) {

	 var eye_bank_id = document.getElementsByName('eye_bank_id')[0].value;
    console.log(eye_bank_id);

    $http
        .get(window.location.origin+"/district/api/eye-bank/get-selected-district/" + eye_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            selected_district = response.data.selected_district;

            $('#district_id').kendoDropDownList({
                optionLabel   : "Select District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#district_id").data("kendoDropDownList");
                dropdownlist.value(selected_district);

        });


        $http
        .get(window.location.origin+"/district/api/eye-bank/get-selected-subdistrict/" + eye_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.subdistricts;
            selected_subdistrict = response.data.selected_subdistrict;
            $('#subdistrict_id').kendoDropDownList({
                optionLabel   : "Select Sub-District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#subdistrict_id").data("kendoDropDownList");
                dropdownlist.value(selected_subdistrict);

        });


        $scope.getSubdistrict = function() 
        {
            var value = $("#district_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/district/sub-district/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log("ok");
                $('#subdistrict_id').kendoDropDownList({
                    optionLabel   : "Select District",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };


        $scope.eye_bank_phone_no = [];

        $scope.AppendPhone = function() {
            
            $scope.eye_bank_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.eye_bank_phone_no.splice(index, 1);
        }


        $scope.eye_bank_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.eye_bank_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.eye_bank_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/eye-bank/api/phone/" + eye_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.eye_bank_phone_no = response.data;
            $scope.eye_bank_phone = $scope.eye_bank_phone_no[0].eye_bank_phone_no;
            $scope.eye_bank_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/eye-bank/api/email/" + eye_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.eye_bank_email_ad = response.data;
            $scope.eye_bank_email = $scope.eye_bank_email_ad[0].eye_bank_email_ad;
            $scope.eye_bank_email_ad.splice(0, 1);
        });




}