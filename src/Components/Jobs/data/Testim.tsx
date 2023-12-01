/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/tricentis.png'

export const testim: Job = {
    id: 'testim',
    image: image,
    name: 'Testim / Tricetis IL',
    period: {
        start: '2021'
    },
    position: 'Developer',
    paragraphs: [
        <>
            In my career, I've had some awesome gigs, like at <em>Dreamed Diabetes</em> and <em>gizra</em>. But I missed
            the buzz of sharing ideas, blogging, and hanging out at meetups—it's what really gets me going. So, I started
            looking for a new job that fit the bill.
        </>,

        <>
            Imagine this: I was on the lookout, but finding a company that ticked all my boxes — a cool product focus and
            an active blog—seemed like finding a unicorn in Israel. Then, out of the blue, a recruiter mentioned
            <em>testim</em>. The more I learned, the more it felt like fate. Their thing? Making E2E tests a breeze
            without drowning in code—just what I needed after grappling with QA headaches at <em>Dreamed Diabetes</em>.
        </>,

        <>
            Joining <em>testim</em> was a rollercoaster of learning! I dove into <em>Typescript</em>, <em>mobx</em>,
            <em>MongoDB</em>, and <em>Express</em>. The tech magic at <em>testim</em> blew my mind, teaching me loads
            about automation and why <em>mobx</em> rocks in managing stuff (though I'm up for a friendly debate on that 😄).
        </>,

        <>
            After a year, <em>testim</em> was acquired by <em>Tricentis</em>, a leading company in the QA domain with
            fantastic products. Yes, the transition to Tricentis was a bit of an emotional rollercoaster, but it opened
            doors to an incredible opportunity—starting to work on a new product called <em>Testim Mobile</em>.
        </>,
        <>
            My time at <em>Dreamed Diabetes</em> showed me how tough it is to automate mobile apps. Now, being part of
            the crew building <em>Testim Mobile</em> feels like a dream project where I can tackle those tough spots.
            Working on <em>testim</em> mobile has been epic—we're crafting something that speaks to the challenges I've
            faced. The future? A bit of a mystery, but trust me, it's looking awesome.
        </>,
    ],
}
