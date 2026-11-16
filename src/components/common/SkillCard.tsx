import Progress from '../ui/Progress';
import type { Skill } from '../../hooks/useSkills';

interface SkillCardProps {
  skill: Skill;
}

const SkillCard = ({ skill }: SkillCardProps) => {
  const IconClass = skill.icon ? (
    <i className={skill.icon} aria-hidden="true" />
  ) : (
    <i className="fa-solid fa-code" aria-hidden="true" />
  );

  return (
    <div className="p-6 rounded-3xl bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10 shadow-xl transition duration-400 group hover:-translate-y-3 hover:border-cyan-500/40">
      <div className="flex items-center gap-4">
        <div className="w-16 h-16 flex-shrink-0 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-500 text-2xl group-hover:bg-cyan-500 group-hover:text-white transition">
          {IconClass}
        </div>
        <div className="flex-1">
          <h3 className="text-xl font-bold text-slate-900 dark:text-white">{skill.title}</h3>
          <p className="mt-1 text-sm text-slate-500 dark:text-slate-400">{skill.category ?? 'Technical Skill'}</p>
        </div>
      </div>
      <div className="mt-5">
        <div className="flex justify-between items-center mb-2">
          <span className="text-xs font-bold text-slate-500">Penguasaan</span>
          <span className="text-sm font-black text-cyan-500">{skill.percentage}%</span>
        </div>
        <Progress value={skill.percentage} />
      </div>
    </div>
  );
};

export default SkillCard;
