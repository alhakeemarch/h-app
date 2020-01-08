@include('person.forms.type')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.ar_name')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.en_name')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.nationaltiy')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.id')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.pasport')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.contact')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.birth')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.personal')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.emp_info')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.educational_info')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.SCE_info')
{{-- --------------------------------------------------------------------------------------------- --}}
@include('person.forms.job_info')
{{-- --------------------------------------------------------------------------------------------- --}}
@if(auth()->user()->is_admin)
@include('person.forms.notes')
@endif
{{-- --------------------------------------------------------------------------------------------- --}}


{{-- 

// -----------------------------

// -----------------------------
mobile
phone
phone_extension
email
mobile2
mobile3
// -----------------------------
foreign_phone1
foreign_phone2
foreign_address1
foreign_address2
personal_email
// -----------------------------
SNA_application_no // Saudi National Address العنوان الوطني
SNA_service_no
SNA_account_no
SNA_building_no
SNA_street_name
SNA_district_name
SNA_city_name
SNA_zip_code
SNA_additional_no
SNA_unit_no
SNA_residence_type // شقة - بيت شعبي - فيلا - قصر - دوبليكس - فندق -
SNA_residence_ownership // مالك - مستأجر - أخرى
// -----------------------------
bank_name
bank_acount_no
bank_IBAN_no
bank_branch_name
bank_branch_no
// -----------------------------
emergency_contact_name1
emergency_contact_mobile1
emergency_contact_relationship1
emergency_contact_name2
emergency_contact_mobile2
emergency_contact_relationship2

// =============================
notes
private_notesid
national_id
// -----------------------------
created_by_id
created_by_name
last_edit_by_id
last_edit_by_name
// -----------------------------
is_employee
is_customer
// -----------------------------
ar_name1
ar_name2
ar_name3
ar_name4
ar_name5
// -----------------------------
en_name1
en_name2
en_name3
en_name4
en_name5
// -----------------------------
gender
relational_status
// -----------------------------
nationaltiy_code
nationaltiy_ar
nationaltiy_en
// -----------------------------
hafizah_no
national_id_issue_date
national_id_expire_date
national_id_issue_place
// -----------------------------
pasport_no
pasport_issue_date
pasport_id_expire_date
pasport_id_issue_place
// -----------------------------
ah_birth_date
ad_birth_date
birth_place
birth_city
// =============================

// -----------------------------
ah_hiring_date
ad_hiring_date
hiring_day
// -----------------------------
employee_no
fingerprint_no
// -----------------------------
Degree
specialization
id_job_title
job_title
division
current_project
// -----------------------------
SCE_membership_no // Saudi Council of Engineers الهيئة السعودية للمهندسين
SCE_membership_expire_date
// -----------------------------
mobile
phone
phone_extension
email
mobile2
mobile3
// -----------------------------
foreign_phone1
foreign_phone2
foreign_address1
foreign_address2
personal_email
// -----------------------------
SNA_application_no // Saudi National Address العنوان الوطني
SNA_service_no
SNA_account_no
SNA_building_no
SNA_street_name
SNA_district_name
SNA_city_name
SNA_zip_code
SNA_additional_no
SNA_unit_no
SNA_residence_type // شقة - بيت شعبي - فيلا - قصر - دوبليكس - فندق -
SNA_residence_ownership // مالك - مستأجر - أخرى
// -----------------------------
bank_name
bank_acount_no
bank_IBAN_no
bank_branch_name
bank_branch_no
// -----------------------------
emergency_contact_name1
emergency_contact_mobile1
emergency_contact_relationship1
emergency_contact_name2
emergency_contact_mobile2
emergency_contact_relationship2

// =============================
notes
private_notes


 --}}