function populateSecondSelect(selectedOption) {
    var dept = document.getElementById('dept');
    var course = document.getElementById('course');

    // Clear the options of the dept dropdown
    dept.options.length = 1;

    // Clear the options of the course dropdown
    course.options.length = 1;
    
    if (selectedOption === 'School of Pure and Applied Sciences') {
        dept.options.add(new Option('Mathematics'));
        dept.options.add(new Option('CIT'));
    } else if (selectedOption === 'School of Engineering') {
        dept.options.add(new Option(' Electrical'));
        dept.options.add(new Option('Civil'));
    }
    else if (selectedOption === 'School of Architecture') {
        dept.options.add(new Option('Architecture'));
        dept.options.add(new Option('Planning'));
    }
}

function populateThirdSelect(selectedOption) {
    var course = document.getElementById('course');
    course.options.length = 1;

    if (selectedOption === 'Mathematics') {
        course.options.add(new Option('Bachelor of Science in Pure Mathematics'));
        course.options.add(new Option('Bachelor of Science in Statistics and Programming'));
    } else if (selectedOption === 'CIT') {
        course.options.add(new Option('Bachelor of Science in Computer Science'));
        course.options.add(new Option('Bachelor of Science in IT '));
    } else if (selectedOption === 'Electrical') {
        course.options.add(new Option('Bachelor of Science in Electrical and Electronics Engineering'));
    } 
    else if (selectedOption === 'Civil') {
        course.options.add(new Option('Bachelor of Science in Civil Engineering'));
    }else if (selectedOption === 'Architecture') {
        course.options.add(new Option('Bachelor of Science in Architecture'));
    }else if (selectedOption === 'Planning') {
        course.options.add(new Option('Bachelor of Science in Design and Planning'));
        course.options.add(new Option('Bachelor of Science in Construction and Planning'));
    }
}

function populateLecSelect(selectedOption) {
    var dept = document.getElementById('dept');

    // Clear the options of the dept dropdown
    dept.options.length = 1;

    // Clear the options of the course dropdown
    
    if (selectedOption === 'School of Pure and Applied Sciences') {
        dept.options.add(new Option('Mathematics'));
        dept.options.add(new Option('CIT'));
    } else if (selectedOption === 'School of Engineering') {
        dept.options.add(new Option(' Electrical'));
        dept.options.add(new Option('Civil'));
    }
    else if (selectedOption === 'School of Architecture') {
        dept.options.add(new Option('Architecture'));
        dept.options.add(new Option('Planning'));
    }
}