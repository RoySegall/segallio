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
            Picture this: it's <em>June 2011</em>, and tents start lining Rothschild St. I just waved goodbye to my job
            as a shift manager at <em>Pizza Hut</em>. Now, don't get me wrong—I love pizza, but professionally, I knew I
            could do more. I've been self-teaching programming from books since I was 15, and at 21, I felt ready to
            take the plunge. But who would hire someone without formal education? Boot camps felt like distant dreams. I
            had to spruce up my CV and send it out—anywhere, everywhere. Destiny would find me, right?
        </>,

        <>
            I ventured to two job interviews. The first—a cozy setup: a small company with just two people, managers who
            seemed refreshingly unorthodox for a hi-tech firm, two rooms, a single developer, and an HR manager. The
            vibe was comforting. The second interview—well, it was at a seemingly disorganized company in
            <em>Petah Tivka</em>, dabbling in a mix of technologies. Quite daunting for someone with zero experience. As
            I strolled home, a call from the first company, <em>gizra</em>, changed everything—I got the job. I was
            ecstatic!
        </>,

        <>
            Initially, it felt overwhelming. I was thrust into the world of <em>Drupal</em>, which seemed complex at
            first but turned out to be one of the best things I've worked with. At <em>gizra</em>, all the myths about
            hi-tech companies were shattered: no need to burn the midnight oil, striking a perfect balance between
            personal and professional life was their priority.
        </>,

        <>
            <em>gizra</em> opened doors to amazing opportunities—I tackled massive and intricate sites, contributed to
            open-source projects, penned blog posts, attended and even organized conferences (with a little help,
            of course). It wasn't about tasks; it was about belief. <em>gizra</em> firmly believed in giving back to the
            community, in automated QA, and meticulous attention to the smallest code details—like code comments, often
            deemed redundant by many companies. CI and automation were key factors in time estimation, a rarity in
            project-centric setups.
        </>,

        <>
            My time at <em>gizra</em> will forever hold a special place in my heart. Don't get me wrong, I moved on for
            professional growth—a pretty funny parallel to why I joined <em>gizra</em> in the first place.
        </>,
    ],
}
