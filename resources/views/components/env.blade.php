<script>
  window.env = {
    csrfField: '@csrf',
    appName: "{{ env('APP_NAME') }}",
    appUrl: "{{ env('APP_URL') }}",
    user: (() => {
      const user = "{{ auth()->user() }}".replace(/&quot;/g, '"');
      return user !== '' ? JSON.parse(user) : undefined;
    })(),
  };
</script>
