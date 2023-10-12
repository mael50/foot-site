<script setup>
const {teams, classement} = defineProps([
    'teams',
    'classement'
]);
</script>


<template>
    <div class="teams">
        <h2 v-if="classement">Classement</h2>
        <div class="team-column">
            <ul class="teams-list">
                <li v-if="classement" class="team">
                    <span class="position">Pos</span>
                    <span>Equipe</span>
                    <div class="team-infos">
                        <span class="day">J</span>
                        <span class="won">G</span>
                        <span class="draw">N</span>
                        <span class="lost">P</span>
                        <span class="goals-diff">+/-</span>
                        <span class="points">Pts</span>
                    </div>
                </li>
                <li v-if="classement" v-for="team in classement.standings[0].table" :key="team.team.id" class="team">
                    <span class="position">{{ team.position }}</span>
                    <img class="team-logo" :src="team.team.crest" :alt="team.team.name">
                    <NuxtLink :to="`/teams/${team.team.id}&compId=${classement.competition.id}`" class="team-name">{{ team.team.name }}</NuxtLink>
                    <div class="team-infos">
                        <span class="day">{{ team.playedGames }}</span>
                        <span class="won">{{ team.won }}</span>
                        <span class="draw">{{ team.draw }}</span>
                        <span class="lost">{{ team.lost }}</span>
                        <span class="goals-diff">{{ team.goalDifference }}</span>
                        <span class="points">{{ team.points }}</span>
                    </div>
                </li>
                <li v-else v-for="team in teams" :key="team.id" class="team">
                    <img class="team-logo" :src="team.crest" :alt="team.name">
                    <NuxtLink :to="`/teams/${team.id}&compId=${classement.competition.id}`" class="team-name">{{ team.name }}</NuxtLink>
                </li>
            </ul>
        </div>
    </div>
</template>
  
  
<style scoped>
.teams {
    display: flex;
    justify-content: space-between;
}

.team-column {
    flex: 1;
}

.teams-list {
    list-style: none;
    padding: 0;
}

.team {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: flex;
    align-items: center;
}

.team-logo {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.team-name {
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    color: #292929;
}

.team-name:hover {
    color: #d5a103
}

.position {
    margin-right: 10px;
    font-weight: bold;
    width: 30px;
}

.team:nth-of-type(2) {
    background-color: rgba(255, 220, 0, 0.2);
}

.team:nth-of-type(3) {
    background-color: rgba(192, 192, 192, 0.2);
}

.team:nth-of-type(4) {
    background-color: rgba(205, 127, 50, 0.2);
}

.team:nth-of-type(2) .position {
    color: gold;
}

.team:nth-of-type(3) .position {
    color: silver;
}

.team:nth-of-type(4) .position {
    color: #cd7f32;
}

.team:nth-last-of-type(1) {
    background-color: rgba(160, 0, 0, 0.2);
}

.team:nth-last-of-type(2) {
    background-color: rgba(160, 0, 0, 0.2);
}

.team:nth-last-of-type(3) {
    background-color: rgba(160, 0, 0, 0.2);
}

.team:nth-last-of-type(1) .position {
    color: rgb(160, 0, 0);
}

.team:nth-last-of-type(2) .position {
    color: rgb(160, 0, 0);
}

.team:nth-last-of-type(3) .position {
    color: rgb(160, 0, 0);
}

.team-infos {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.day {
    margin-right: 10px;
    width: 30px;
}

.won {
    margin-right: 10px;
    width: 30px;
}

.draw {
    margin-right: 10px;
    width: 30px;
}

.lost {
    margin-right: 10px;
    width: 30px;
}

.goals-diff {
    margin-right: 10px;
    width: 30px;
}

.points {
    margin-right: 10px;
    width: 30px;
    font-weight: bold;
}



</style>
  