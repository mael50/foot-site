<template>
    <h2 v-if="classement">{{ classement.competition.name }} {{ classement.filters.season }} / {{
        parseInt(classement.filters.season) + 1 }} - {{ classement.area.name }} <img :src="classement.area.flag"
            :alt="classement.competition.name" width="30"></h2>
    <h2 v-else>Equipes</h2>
    <div>
        <nav class="competition-nav">
            <button @click="toggleTab('classement')" class="active">Classement</button>
            <button @click="toggleTab('top-scorers')">Meilleurs buteurs</button>
            <button @click="toggleTab('calendar')">Calendrier</button>
        </nav>
        <TeamsList :teams="teams" :classement="classement" />
        <TopScorers :topScorers="topScorers" />
        <Calendar :calendar="calendar" />
    </div>
</template>
  
<style>
.competition-nav {
    display: flex;
    justify-content: center;
}

.competition-nav button {
    background-color: transparent;
    border: none;
    width: 50%;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    font-size: 0.9rem;
    color: #000;
    transition: all 0.3s ease-in-out;
}

.competition-nav button:hover {
    background-color: #d5a0037e;
    color: #fff;
}

.competition-nav button.active {
    background-color: #d5a003;
    color: #fff;
}
</style>

<script setup>
import { useRoute } from 'vue-router';
import { callApi } from '~/plugins/api';

const route = useRoute();
const id = route.params.id;
const cupsId = [2001, 2018, 2152, 2000];
let teams = [];
let classement = [];
const topScorers = await callApi(`competitions/${id}/scorers`);
const calendar = await callApi(`competitions/${id}/matches`);
if (cupsId.includes(parseInt(id))) {
    const result = await callApi(`competitions/${id}/teams`);
    teams = result.teams;
} else {
    const result = await callApi(`competitions/${id}/standings`);
    classement = result;
    teams = result.standings[0].table.map(team => {
        return {
            id: team.team.id,
            name: team.team.name,
            crest: team.team.crest
        };
    });
}

if (teams.length === 0) {
    teams = [
        {
            id: 1,
            name: 'Pas d\'équipe',
            crest: 'https://th.bing.com/th/id/OIP.pu6KH3RR6AYzEGU1FmvWugHaHO?pid=ImgDet&rs=1'
        }
    ];
}

onMounted(() => {
    toggleTab('classement');
});

function toggleTab(tab) {
    let topScorers = document.querySelector('.top-scorers');
    let topScorersBtn = document.querySelector('.competition-nav button:nth-child(2)');
    let classement = document.querySelector('.teams');
    let classementBtn = document.querySelector('.competition-nav button:nth-child(1)');
    let calendar = document.querySelector('.calendar');
    let calendarBtn = document.querySelector('.competition-nav button:nth-child(3)');
    switch (tab) {
        case 'classement':
            topScorers.style.display = 'none';
            topScorersBtn.classList.remove('active');
            classement.style.display = 'block';
            classementBtn.classList.add('active');
            calendar.style.display = 'none';
            calendarBtn.classList.remove('active');
            break;
        case 'top-scorers':
            topScorers.style.display = 'block';
            topScorersBtn.classList.add('active');
            classement.style.display = 'none';
            classementBtn.classList.remove('active');
            calendar.style.display = 'none';
            calendarBtn.classList.remove('active');
            break;
        case 'calendar':
            topScorers.style.display = 'none';
            topScorersBtn.classList.remove('active');
            classement.style.display = 'none';
            classementBtn.classList.remove('active');
            calendar.style.display = 'block';
            calendarBtn.classList.add('active');
            break;
    }
}

</script>