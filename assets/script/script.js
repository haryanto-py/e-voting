const counterspersent = document.querySelectorAll('.counterpersen');
const counters = document.querySelectorAll('.counternormal');

counterspersent.forEach(counter => {
    counter.innerText = '0%';

    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const currentCount = +counter.innerText.replace('%', '');

        const increment = target / 500;

        if (currentCount < target) {
            counter.innerText = `${Math.ceil(currentCount + increment)}%`;
            setTimeout(updateCounter, 1);
        } else {
            counter.innerText = target + '%';
        }
    };

    updateCounter();
});

counters.forEach(counter => {
    counter.innerText = '0';

    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const currentCount = +counter.innerText;

        const increment = target / 500;

        if (currentCount < target) {
            counter.innerText = `${Math.ceil(currentCount + increment)}`;
            setTimeout(updateCounter, 1);
        } else {
            counter.innerText = target;
        }
    };

    updateCounter();
});

document.getElementById('scrollButton').addEventListener('click', function () {
    document.getElementById('section2').scrollIntoView({
        behavior: 'smooth'
    });
});

function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}