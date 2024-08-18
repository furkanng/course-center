function updateFormFields() {
    var role = document.querySelector('input[name="role"]:checked').value;

    var requiredFields = ["company_name", "company_type"];

    var justUserFilds = ["user_type"];

    if (role === "guest") {
        requiredFields.forEach(function (id) {
            var field = document.getElementById(id);
            field.style.display = 'none';
            field.querySelector('input, select').removeAttribute('required');
        });
    } else if (role === "company") {
        requiredFields.forEach(function (id) {
            var field = document.getElementById(id);
            field.style.display = 'block';
            field.querySelector('input, select').setAttribute('required', 'required');
        });

        justUserFilds.forEach(function (id) {
            var field = document.getElementById(id);
            field.style.display = 'none';
            field.querySelector('input, select').removeAttribute('required');
        });
    }
}

function formatPhoneNumber(input) {
    // Temizleme: sadece sayılar kalsın
    var cleaned = ('' + input.value).replace(/\D/g, '');

    // Parçalara ayırma
    var match = cleaned.match(/^(\d{3})(\d{3})(\d{2})(\d{2})$/);

    if (match) {
        input.value = '(' + match[1] + ') ' + match[2] + ' ' + match[3] + ' ' + match[4];
    }
}

function updateDistricts() {
    const citySelect = document.getElementById('citySelect');
    const provinceName = citySelect.value;
    if (provinceName) {
        fetchDistricts(provinceName);
    } else {
        document.getElementById('districtSelect').innerHTML = '<option value="">Önce ili seçiniz</option>';
        // Nice Select'i güncelleyin
        $('select').niceSelect('update');
    }
}

function fetchProvinces() {
    fetch('https://turkiyeapi.dev/api/v1/provinces')
        .then(response => response.json())
        .then(data => {
            const provinces = data.data;
            populateProvinces(provinces);
        })
        .catch(error => console.error('Error fetching provinces:', error));
}

function populateProvinces(provinces) {
    const citySelect = document.getElementById('citySelect');
    citySelect.innerHTML = '<option value="">Seciniz</option>';
    provinces.forEach(province => {
        const option = document.createElement('option');
        option.value = province.name;
        option.textContent = province.name;
        citySelect.appendChild(option);
    });

    $('select').niceSelect('update');

    // İl seçimi değiştiğinde ilçeleri güncelleme
    citySelect.addEventListener('change', function () {
        const provinceId = this.value;
        if (provinceId) {
            fetchDistricts(provinceId);
        } else {
            document.getElementById('districtSelect').innerHTML = '<option value="">Önce ili seçiniz</option>';
            $('select').niceSelect('update');
        }
    });
}

function fetchDistricts(provinceName) {
    fetch(`https://turkiyeapi.dev/api/v1/provinces?name=${provinceName}`)
        .then(response => response.json())
        .then(data => {
            const districts = data.data[0].districts;
            populateDistricts(districts);
        })
        .catch(error => console.error('Error fetching districts:', error));
}

function populateDistricts(districts) {
    const districtSelect = document.getElementById('districtSelect');
    districtSelect.innerHTML = '<option value="">Seçiniz</option>';
    districts.forEach(district => {
        const option = document.createElement('option');
        option.value = district.name;
        option.textContent = district.name;
        districtSelect.appendChild(option);
    });

    // Nice Select'i güncelleyin
    $('select').niceSelect('update');
}
