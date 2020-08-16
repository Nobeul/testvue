<template>
    <div id="app">
        <p>I am From E vue</p>
        <router-view></router-view>
        <router-link :to="{path:'/d'}"><p>Click me</p></router-link>
    </div>
</template>