/** POST JSON to site mail API (works from any page path under the site root). */
window.postFormMail = async function postFormMail(payload) {
  const url = new URL('api/send-form.php', window.location.href).href;
  const controller = new AbortController();
  const timer = setTimeout(() => controller.abort(), 35000);

  try {
    const res = await fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(payload),
      signal: controller.signal,
    });
    const result = await res.json().catch(() => ({}));
    if (!res.ok || !result.ok) {
      throw new Error(result.error || 'Could not send. Please try again.');
    }
    return result;
  } catch (err) {
    if (err.name === 'AbortError') {
      throw new Error('Request timed out. Check your connection and try again.');
    }
    if (err.message === 'Failed to fetch') {
      throw new Error('Cannot reach the server. Open the site via http://localhost/codecraft/ (not as a file).');
    }
    throw err;
  } finally {
    clearTimeout(timer);
  }
};
