'use client';

import {useCallback, useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faChevronLeft, faChevronRight} from '@fortawesome/free-solid-svg-icons'
import {jobs as jobEntries} from './data'
import type {FC} from 'react';
import type {Job} from "@/Components/Jobs/data/Job";

const Job: FC<{job: Job}> = ({job}) => <div className={styles.jobWrapper}>
    <div className={styles.header}>

        <div className={styles.logo}>
            <Image src={job.image} fill alt={job.name} />
        </div>
        <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>{job.name}, {job.period.start} {job.period?.end && ` - ${job.period.end}`}: {job.position}</h3>
    </div>

    <div className={styles.jobInfo}>
        {job.paragraphs.map((paragraph, index) => <p key={index} className={robotoMono.className}>{paragraph}</p>)}
    </div>
</div>;

export const Jobs = () => {
    const jobs = useMemo( () => [jobEntries.testim, jobEntries.dreamed, jobEntries.taliaz, jobEntries.realCommerce, jobEntries.gizra], []);

    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <div className={styles.jobs}>
            <h2>Jobs</h2>
        </div>

        <div className={styles.timeline}>

            <h3>Updates</h3>
            <label>23 in the last 7 hours</label>
        </div>

    </div>
}
