
<script setup>
import { useRoute } from 'vue-router';
import { callApi } from '~/plugins/api';

const route = useRoute();
const params = new URLSearchParams(route.fullPath.split('&')[1]);
const compId = params.get('compId');
const teamId = route.params.id.split('&')[0];

const team = await callApi(`teams/${route.params.id}`);
const squad = await callApi(`teams/${route.params.id}/players`);
const matches = await callApi(`teams/${teamId}/matches`);
console.log(matches);
const classement = await callApi(`competitions/${compId}/standings`);


function toggleTab(tab) {
    const stats = document.querySelector('.team-stats');
    const statsBtn = document.querySelector('.competition-nav button:nth-child(1)');
    const squad = document.querySelector('.team-squad');
    const squadBtn = document.querySelector('.competition-nav button:nth-child(2)');
    const calendar = document.querySelector('.team-calendar');
    const calendarBtn = document.querySelector('.competition-nav button:nth-child(3)');
    stats.style.display = 'block';
    statsBtn.classList.add('active');
    squad.style.display = 'none';
    squadBtn.classList.remove('active');
    calendar.style.display = 'none';
    calendarBtn.classList.remove('active');

    switch (tab) {
        case 'stats':
            stats.style.display = 'block';
            statsBtn.classList.add('active');
            squad.style.display = 'none';
            squadBtn.classList.remove('active');
            calendar.style.display = 'none';
            calendarBtn.classList.remove('active');
            break;
        case 'squad':
            stats.style.display = 'none';
            statsBtn.classList.remove('active');
            squad.style.display = 'block';
            squadBtn.classList.add('active');
            calendar.style.display = 'none';
            calendarBtn.classList.remove('active');
            break;
        case 'calendar':
            stats.style.display = 'none';
            statsBtn.classList.remove('active');
            squad.style.display = 'none';
            squadBtn.classList.remove('active');
            calendar.style.display = 'block';
            calendarBtn.classList.add('active');
            break;
        default:

            break;
    }
}

</script>

<template>
    <div class="back">
        <NuxtLink :to="`/competitions/${compId}`">
            &lt; Retour
        </NuxtLink>
    </div>
    <div>
        <nav class="competition-nav">
            <button @click="toggleTab('stats')" class="active">Infos équipe</button>
            <button @click="toggleTab('squad')">Effectif</button>
            <button @click="toggleTab('calendar')">Calendrier</button>
        </nav>
        <TeamStats :team="team" :classement="classement" />
        <TeamSquad style="display: none;" :squad="squad" />
        <TeamCalendar style="display: none;" :matches="matches" />
    </div>
</template>


<style scoped>
.back {
    margin-bottom: 20px;
}

.back a {
    text-decoration: none;
    color: #292929;
    font-weight: bold;
}
</style>

