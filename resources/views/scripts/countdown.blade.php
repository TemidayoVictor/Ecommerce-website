<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/api/get-active-sale')
        .then(response => response.json())
        .then(data => {
            if (data.sale) {
                let startTime = new Date(data.sale.start_time).getTime();
                let endTime = new Date(data.sale.end_time).getTime();
                let now = new Date(data.current_time).getTime();

                let countdownText = document.getElementById("countdown-text");

                if (now < startTime) {
                    startCountdown(startTime, "Sale starts in: ");
                } else if (now >= startTime && now < endTime) {
                    startCountdown(endTime, "Sale ends in: ");
                } else {
                    countdownText.innerText = "No active sales";
                }
            } else {
                document.getElementById("countdown-text").innerText = "No active sales";
            }
        });

    function startCountdown(targetTime, message) {
        let countdownText = document.getElementById("countdown-text");

        let interval = setInterval(function() {
            let now = new Date().getTime();
            let timeLeft = targetTime - now;

            if (timeLeft <= 0) {
                clearInterval(interval);
                location.reload();
            } else {
                let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                countdownText.innerHTML = `<div>
                    <span class="msg">${message}</span> <span class="box">${days}d:</span> <span class="box">${hours}h:</span> <span class="box">${minutes}m:</span> <span class="box">${seconds}s</span>
                    </div>`;
            }
        }, 1000);
    }
});
</script>