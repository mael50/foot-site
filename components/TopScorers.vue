<script setup>
const {topScorers} = defineProps([
    'topScorers'
]);
</script>

<template>
    <div class="top-scorers">
        <h2>Meilleurs buteurs</h2>
        <ul class="top-scorers-list">
            <li class="scorer">
                <span class="position">Joueur</span>
                <span class="team">Club</span>
                <span class="goals">Buts (pen.)</span>
                <span class="played">Matchs</span>
            </li>
            <li v-for="scorer in topScorers.scorers" :key="scorer.player.id" class="scorer">
                <span class="position">{{ scorer.player.name }}</span>
                <span class="team"><img class="team-logo" :src="scorer.team.crest" :alt="scorer.team.name">{{ scorer.team.name }}</span>
                <span class="goals">{{ scorer.goals }} ({{ !scorer.penalties ? 0 : scorer.penalties }} pen.)</span>
                <span class="played">{{ scorer.playedMatches }}</span>
            </li>
        </ul>
    </div>
</template>

<style>
.top-scorers {
    margin-top: 20px;
}

.top-scorers-list {
    list-style: none;
    padding: 0;
}

.scorer {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.scorer span {
    flex: 1;
}

.scorer .position {
    flex: 2;
    font-weight: bold;
}

.scorer .team {
    flex: 3;
}

.scorer .goals {
    flex: 2;
}

.scorer .played {
    flex: 1;
}

.scorer .team-logo {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.team {
    display: flex;
    align-items: center;
}

</style>