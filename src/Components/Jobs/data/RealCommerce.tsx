/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/rc.png'

export const realCommerce: Job = {
    id: 'realCommerce',
    image: image,
    name: 'Real Commerce',
    period: {
        start: '2018'
    },
    position: 'Consulting',
    paragraphs: [
        <>
            During my final three months at <em>gizra</em>, I received an unexpected task from my CTO, <em>Amitai</em>:
            lending a hand to another project for a company in need of assistance with a <em>Drupal</em> project. It
            echoed a past experience with a customer—<em>Harvard</em>. My role encompassed two critical aspects:
            consulting on <em>Drupal</em>-related issues and overseeing other employees to sustain the project.
        </>,
        <>
            Those three months were a unique phase for me—I was on the job hunt, attending interviews, yet
            simultaneously consulting for a company whose organizational workflow was entirely unfamiliar to me.
            It felt like briefly immersing myself in another company, becoming a part of their world while keeping an
            eye out for my next long-term professional venture.
        </>,
        <>
            Socially, it was fantastic! I felt right at home and connected with the people. Professionally though, it
            became taxing—yet another <em>Drupal</em> project without CI or automated tests. However, the team, project
            manager, and CTO were incredibly supportive and even proposed a position. I declined, seeking something
            different.
        </>,
        <>
            Every brief stint at a company, including <em>Real Commerce</em>, leaves an impact. From there, I learned to
            look beyond the lens of a mere developer—to understand how a feature or infrastructure gaps could hinder
            development. It gave me insight into how <em>Drupal</em> plays a pivotal role in larger organizations today,
            especially alongside innovative technologies like <em>NodeJS</em>.
        </>
    ],
}
