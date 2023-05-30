import type {FC} from 'react';
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import type {Job} from "@/Components/Jobs/data/Job";
import {Dreamed} from "@/Components/Jobs/data/Dreamed";
import {Gizra} from "@/Components/Jobs/data/Gizra";
import {Taliaz} from "@/Components/Jobs/data/Taliaz";

const Job: FC<{job: Job}> = ({job}) => <>
    <div className={styles.header}>

        <div className={styles.logo}>
            <Image src={job.image} fill alt={job.name} />
        </div>
        <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>{job.name}, {job.period.start} {job.period?.end && ` - ${job.period.end}`}: {job.position}</h3>
    </div>

    <div className={styles.jobInfo}>
        {job.paragraphs.map((paragraph, index) => <p key={index} className={robotoMono.className}>{paragraph}</p>)}
    </div>
</>;

export const Jobs = () => <div className={styles.jobsWrapper} id='jobs'>

    <div className={styles.jobs}>
        <h2 className={robotoMono.className}>Jobs</h2>
        <div className={styles.content}>
            <Job job={Taliaz} />
        </div>
    </div>

</div>
