<script setup>
import { callApi } from '~/plugins/api';

const results = await callApi('competitions');

const typeSort = {};

results.competitions.forEach(competition => {
    if(!typeSort[competition.type]) {
        typeSort[competition.type] = [];
    }
    typeSort[competition.type].push(competition);
});
</script>

<template>
    <div class="sidebar">
        <ul id="all-competitions" class="competitions-list">
            <li v-for="type in typeSort" :key="type">
                <div v-if="type[0].type == 'LEAGUE'">
                    <h3>{{ type[0].type }}</h3>
                    <NuxtLink v-for="competition in type" :key="competition.id" :to="`/competitions/${competition.id}`" class="competition">
                        <img class="competition-flag" :src="competition.emblem" :alt="competition.name">
                        <span>{{ competition.name }}</span>
                    </NuxtLink>
                </div>
            </li>
        </ul>
    </div>
</template>

<style>
.sidebar {
    display: flex;
    align-items: center;
    margin-left: 30px;
    height: 80vh;
    padding : 20px;
    margin-top: auto;
    margin-bottom: auto;
    border-radius: 30px;
    background-color: #d5d3d533;
    box-shadow: 0 0 10px #ccc;

}

.main-content {
    flex: 1;
}

.competitions-list {
    list-style: none;
    padding: 0;
    height: 100%;
}

.competition {
    display: flex;
    align-items: center;
    padding: 10px;
    margin-top: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    height: 4.7%;
    text-decoration: none;
    color: #303030;
}

.competition:hover {
    background-color: #ccc;
    border-radius: 10px;
}

.competition-flag {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.disabled {
    color: #6d6c6c;
    cursor: not-allowed;
}
</style>

