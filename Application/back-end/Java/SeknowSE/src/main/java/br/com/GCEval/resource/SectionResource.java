package br.com.GCEval.resource;

import br.com.GCEval.model.Question;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Section;
import br.com.GCEval.repository.QuestionRepository;
import br.com.GCEval.repository.SectionRepository;

@RestController
@RequestMapping("/sections")
public class SectionResource {

    @Autowired
    private SectionRepository sectionRepository;

    @Autowired
    private QuestionRepository questionRepository;

    @GetMapping
    public List<Section> findAll() {
        return sectionRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Section> findById(@PathVariable Integer id) {

        Optional<Section> sections = sectionRepository.findById(id);
        return sections;

    }

}
