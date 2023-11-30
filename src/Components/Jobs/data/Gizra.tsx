/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/gizra.png'

export const gizra: Job = {
    id: 'gizra',
    image: image,
    name: 'gizra',
    period: {
        end: '2011',
        start: '2018'
    },
    position: 'Lead developer',
    paragraphs: [
        <>
            It was <em>June 2011</em> and Rotchild st. will start to fill with tents. I just quit my job in
            <em>Pizza Hut</em> as a shift manager. Don't get me wrong - I love Pizza but for my professional life it seems
            that I can do more. I knew it. I'm learning how to program by my self from books since I was 15 years old
            and now, 21 years old I can go for it. But... Who would take me without any formal education? Not to talk
            about boot camps which at the time seems like something from the future. I need to start polishing my CV and
            send it. It doesn't matter - just send it. Eventually, it will hit and destiny will shine upon me!
        </>,

        <>
            I went to two job interviews. The first one was a small company - two people, which look unorthodox for a
            hi-tech company managers (but in a good way), two rooms, and a single developer with a single HR manager.
            Seems cozy. The second one was at a company that looks odd, not fully organized, uses a couple of
            technologies, and located at <em>Petah Tivka</em>. Seems a bit frightening for someone without any experience.
            As I walked home, I got a call from the first company - <em>gizra</em> and they told me I got the job. I was
            thrilled!
        </>,

        <>
            At first, it was horrible. I got to work with something called <em>Drupal</em>, at the time seems complex
            but in a look back it's one of the best things I've got to work with. In <em>gizra</em> all the myths about
            hi-tech companies are shuttered: you don't need to kill your self with long hours, the balance between
            personal life and professional life is at the top of priorities.
        </>,

        <>
            In <em>gizra</em> I got to do amazing stuff - I worked on big and complex sites, I contributed back to open
            source projects, I got to write blog posts, I went to conferences and even organized a couple by my self
            (with help from other people as well). And it's not because they were tasks that we have to do, it's because
            my managers believed that we need to contribute back to the community. <em>gizra</em> believed, and still
            believes, in automated QA, and taking care of the smallest details - even in the code comments which a lot
            of companies think it's redundant. I remember that CI and automation were a huge part of the time estimation.
            Those things are not something you can see in a lot of companies - especially project-based companies.
        </>,

        <>
            The time in <em>gizra</em> will forever have a special place in my heart. Don't get me wrong, I quit due to
            professional reason - I looked for more. Pretty funny that this is the same reason I came to <em>gizra</em>
            in the first
            place.
        </>,
    ],
}
