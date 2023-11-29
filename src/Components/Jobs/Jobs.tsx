'use client';

import {useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {jobs as jobEntries} from './data'

export const Jobs = () => {
    const jobs = [
        jobEntries.gizra,
        jobEntries.realCommerce,
        jobEntries.taliaz,
        jobEntries.dreamed,
        jobEntries.testim,
    ];
    const [jobId, setJobId] = useState(jobEntries.gizra.id);
    const selectedJob = useMemo(() => jobs.find(job => job.id === jobId) || jobEntries.testim, [jobs, jobId]);
    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <h2>Jobs</h2>

        <div className={styles.timelineJobWrapper}>
            <div className={styles.timeline}>
                <div className={styles.box}>
                    <div className={styles.container}>
                        <div className={styles.cards}>
                            {jobs.map((job, index) => <div className={styles.card} key={index} onClick={() => setJobId(job.id)}>
                                    <div className={`${styles.dot} ${job.id === jobId && styles.active}`}></div>
                                    <h4>{job.name}</h4>
                                    <p>{job.position}, {job.period.start} {job.period.end && `- ${job.period.end}`}</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
            <div className={styles.job}>
                <Image src={selectedJob.image} height={70} alt={selectedJob.name} />

                <div className={styles.paragraphs}>
                    {selectedJob.paragraphs.map((paragraph, index) => <p key={index}>{paragraph}</p>)}
                </div>
            </div>
        </div>

    </div>
}
