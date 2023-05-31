/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/rc.png'

export const realCommerce: Job = {
    image: image,
    name: 'Real Commerce',
    period: {
        start: '2018'
    },
    position: 'Consulting',
    paragraphs: [
        <>
            At my last 3 months over <em>gizra</em>, I got a bonus from my CTO, <em>Amitai</em>: Another project company needed help with a
            <em>Drupal</em> project and I was sent to the task. It was something that I did with a customer in the past, <em>Harvard</em>, I
            needed to do two stuff: consulting with issues which related to <em>Drupal</em>, managed other employee and help them to
            maintain the project.
        </>,
        <>
            It was a very special period for me: I was looking for a job and went to job interviews but yet, I was doing consulting
            for another company which I know nothing about their organization workflow. It felt to me that I need to join another
            company, become one of their own for a very short period but still keep my eyes open for my next long term professional
            relationship.
        </>,
        <>
            From a social perspective, they were good! I felt I was at home and love the people. From my professional perspective, I
            couldn't take it anymore - another <em>Drupal</em> project that has no CI nor automated tests. But, the team, project manager,
            and the CTO was very helpful and even propose a position. I declined because I was looking for something else.
        </>,
        <>
            Each company I've has been to, even for a short period, I take the good stuff and try to look at how it impacted me.
            From <em>Real Commerce</em> I took the ability to look beyond to simple developer point of view and can see how the feature or
            the lack of infrastructure can hurt the development, got a better understand how <em>Drupal</em> can help big organizations in
            these days, especially when there are cool technologies like <em>NodeJS</em>.
        </>
    ],
}
