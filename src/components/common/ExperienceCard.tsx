import { getPublicUrl } from '../../hooks/useStorage';
import type { Experience } from '../../hooks/useExperiences';

interface ExperienceCardProps {
  experience: Experience;
}

const ExperienceCard = ({ experience }: ExperienceCardProps) => {
  const imageUrl = getPublicUrl(experience.image);

  return (
    <div className="p-6 rounded-3xl bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10 shadow-xl transition duration-300 hover:-translate-y-3 hover:border-cyan-500/40">
      <div className="flex flex-col md:flex-row gap-6">
        {imageUrl && (
          <div className="w-full md:w-48 shrink-0">
            <img src={imageUrl} alt={experience.position} className="w-full h-36 object-cover rounded-2xl" />
          </div>
        )}
        <div className="flex-1">
          <p className="text-sm text-cyan-500 font-semibold">{experience.period}</p>
          <h3 className="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{experience.position}</h3>
          <p className="text-slate-500 font-medium mt-1">{experience.organization}</p>
          <p className="mt-3 text-slate-600 dark:text-slate-300 leading-7">{experience.description ?? '-'}</p>
        </div>
      </div>
    </div>
  );
};

export default ExperienceCard;
