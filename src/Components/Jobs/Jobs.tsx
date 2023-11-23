'use client';

import {useCallback, useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
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
    const [selectedJob, setSelectedJob] = useState(jobEntries.gizra.id);
    const selectedJobData = useMemo(() => jobs.find(job => job.id === selectedJob) || jobEntries.testim, [jobs, selectedJob]);
    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <div className={styles.timeline}>
            <h3>Jobs</h3>

            <div className={styles.box}>
                <div className={styles.container}>
                    <div className={styles.cards}>
                        {jobs.map((job, index) => <div className={styles.card} key={index} onClick={() => setSelectedJob(job.id)}>
                                <div className={`${styles.dot} ${job.id === selectedJob && styles.active}`}></div>
                                <h4>{job.name}</h4>
                                <p>{job.position}, {job.period.start} {job.period.end && `- ${job.period.end}`}</p>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </div>
        <div className={styles.job}>
            <Image src={selectedJobData.image} height={70} alt={selectedJobData.name} />

            <div className={styles.paragraphs}>
                {selectedJobData.paragraphs.map((paragraph, index) => <p key={index}>{paragraph}</p>)}
            </div>
        </div>
    </div>
}
