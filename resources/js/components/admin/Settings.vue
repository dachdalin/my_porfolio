<!-- help generate template settings admin -->
<template>
  <div>
    <h1>Settings</h1>
    <form >
      <div>
        <label for="siteName">Site Name:</label>
        <input type="text" id="siteName" />
      </div>
      <div>
        <label for="siteUrl">Site URL:</label>
        <input type="text"  id="siteUrl" />
      </div>
      <button type="submit">Save Settings</button>
    </form>
  </div>
</template>
<script>
export default {
  name: 'Settings',
};
</script>
