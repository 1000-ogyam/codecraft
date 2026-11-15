window.prepareSeatForm = function prepareSeatForm(form, onUpdate) {
  const track = form.dataset.seatTrack;
  const select = form.querySelector('[name="offer"]');
  const note = document.getElementById('seatAvailability');
  const cardLine = document.getElementById('seatLeft');

  function paint(info) {
    const unit = info.unit === 'weekend' ? 'weekend' : 'week';
    const line = info.full
      ? 'In-person seats for this ' + unit + ' are full (' + info.booked + ' of ' + info.capacity + '). Wait for the ' + info.nextPeriodLabel + '.'
      : info.left + ' of ' + info.capacity + ' in-person seats left for the ' + info.periodLabel + '.';
    if (note) note.textContent = line;
    if (cardLine) cardLine.textContent = line;

    const inPerson = Array.from(select.options).find((option) => option.value.indexOf('In person') === 0);
    let waitlist = Array.from(select.options).find((option) => option.value.indexOf('Waitlist') === 0);
    if (info.full) {
      if (inPerson) inPerson.disabled = true;
      if (!waitlist) {
        waitlist = new Option('Wait for the ' + info.nextPeriodLabel, 'Waitlist — ' + info.nextPeriodLabel);
        select.add(waitlist);
      }
      if (select.value === (inPerson && inPerson.value)) select.value = waitlist.value;
    } else if (inPerson) {
      inPerson.disabled = false;
      if (waitlist) waitlist.remove();
    }
    if (typeof onUpdate === 'function') onUpdate();
  }

  async function refresh() {
    const res = await fetch(new URL('api/seats.php?track=' + encodeURIComponent(track), window.location.href).href);
    const info = await res.json();
    if (!res.ok || !info.ok) throw new Error(info.error || 'Seat count could not be loaded.');
    paint(info);
    return info;
  }

  window.holdInPersonSeat = async function holdInPersonSeat() {
    const res = await fetch(new URL('api/seats.php', window.location.href).href, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify({ track: track, action: 'book' })
    });
    const info = await res.json().catch(() => ({}));
    paint(info.capacity ? info : await refresh().catch(() => info));
    if (!res.ok || !info.ok) {
      throw new Error(info.error || 'In-person seats for this period are full. Wait for the next one.');
    }
    return info;
  };

  refresh().catch((err) => {
    if (note) note.textContent = err.message;
  });
};
