var day = JSON.parse('{!! json_encode($twoWeeks) !!}');
var userNum = JSON.parse('{!! json_encode($userNum) !!}');
var WithdrawNum = JSON.parse('{!! json_encode($WithdrawNum) !!}');
var affiliatesNum = JSON.parse('{!! json_encode($affiliatesNum) !!}');
var visitorsNum = JSON.parse('{!! json_encode($visitorsNum) !!}');
var DepositsNum = JSON.parse('{!! json_encode($DepositsNum) !!}');
var CompaniesNum = JSON.parse('{!! json_encode($CompaniesNum) !!}');
var maxUserCount = JSON.parse('{!! json_encode($maxUserCount) !!}');
var WithdrawalsSumNum = JSON.parse('{!! json_encode($WithdrawalsSumNum) !!}');
var maxWithdrawCount = JSON.parse('{!! json_encode($maxWithdrawCount) !!}');
var maxAffiliatesCount = JSON.parse('{!! json_encode($maxAffiliatesCount) !!}');
var maxVisitorsCount = JSON.parse('{!! json_encode($maxVisitorsCount) !!}');
var maxDepositsCount = JSON.parse('{!! json_encode($maxDepositsCount) !!}');
var maxWithdrawalsSumNum = JSON.parse('{!! json_encode($maxWithdrawalsSumNum) !!}');
var maxCompaniesNum = JSON.parse('{!! json_encode($maxCompaniesNum) !!}');
var finalFiveCountries = JSON.parse('{!! json_encode($finalFiveCountries) !!}');
var finalCountriesNum = JSON.parse('{!! json_encode($finalCountriesNum) !!}');
console.log(WithdrawalsSumNum);


const labels = day
const companyData = {
    labels: labels,
    datasets: [{
        label: 'Number of Companies in last two weeks',
        data: CompaniesNum,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};
const companyConfig = {
    type: 'line',
    data: companyData,
};

const companyChart = new Chart(
    document.getElementById('companyChart'),
    companyConfig
);

const data = {
    labels: day,
    datasets: [{
        label: 'Number of users last two weeks',
        backgroundColor: '#6149CD',
        borderColor: '#6149CD',
        data: userNum,
    }]

};


const numUser = {
    type: 'line',
    data: data,
    options: {
        animations: {
            tension: {
                duration: 1000,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
            }
        },
        scales: {
            y: { // defining min and max so hiding the dataset does not change scale range
                label: 'users Num',
                min: 0,
                max: maxUserCount + 2
            }
        }
    }
};


const Deposits = {
    labels: day,
    datasets: [{
        label: 'Deposits in last two weeks ',
        data: DepositsNum,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
};
const DepositsConfig = {
    type: 'bar',
    data: Deposits,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: maxDepositsCount + 2
            }
        }
    },
};

const TotalWithdrawalsData = {
    labels: day,
    datasets: [{
        label: 'Withdrawals Sum users last two weeks',
        backgroundColor: '#6149CD',
        borderColor: '#6149CD',
        data: WithdrawalsSumNum,
    }]

};
const WithdrawalsSum = {
    type: 'line',
    data: TotalWithdrawalsData,
    options: {
        animations: {
            tension: {
                duration: 0,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
            }
        },
        scales: {
            y: { // defining min and max so hiding the dataset does not change scale range
                label: 'Withdrawals Sum',
                min: 0,
                max: maxWithdrawalsSumNum + 500
            }
        }
    }
};

const myChartWithdrawalsSums = new Chart(
    document.getElementById('TotalWithdrawals'),
    WithdrawalsSum
);