<script setup>
const { matches } = defineProps([
    'matches'
]);

console.log(matches);

const options = {year: 'numeric', month: 'numeric', day: 'numeric' };


</script>

<template>
    <div class="team-calendar">
        <h2>Calendrier</h2>
        <div v-for="match in matches.matches" :key="match.id" class="match">
            <div class="match__day">J.{{ match.matchday }}</div>
            <div class="match__home-team">
                <img :src="match.homeTeam.crest" alt="home team logo" class="team-logo" />
                <div class="match__team-name">{{ match.homeTeam.name }}</div>
            </div>
            <div class="match__score">{{ match.score.fullTime.home != null ? `${match.score.fullTime.home} - ${match.score.fullTime.away}` : new Date(match.utcDate).toLocaleDateString('fr-FR', options)  }}</div>
            <div class="match__away-team">
                <img :src="match.awayTeam.crest" alt="away team logo" class="team-logo" />
                <div class="match__team-name">{{ match.awayTeam.name }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.match {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
}

.match__date {
    font-weight: bold;
    margin-right: 10px;
}

.match__home-team,
.match__away-team {
    display: flex;
    align-items: center;
    justify-content: left;
    flex: 2
}

.match__home-team {
    justify-content: flex-end;
}

.match__team-name {
    margin-left: 10px;
}

.match__score {
    font-weight: bold;
    flex: 1;
    text-align: center;
}

.match__status {
    font-style: italic;
}

.match__day {
    font-weight: bold;
    margin-right: 10px;
}

.team-logo {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}
</style>